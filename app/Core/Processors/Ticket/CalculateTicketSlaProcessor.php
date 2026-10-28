<?php

namespace App\Core\Processors\Ticket;

use App\Common\Exceptions\BusinessException;
use App\Contracts\Repositories\SlaRepositoryInterface;
use App\Core\Processors\Ticket\Context\StoreTicketContext;
use App\Models\TicketSla;
use Closure;
use DateInterval;

class CalculateTicketSlaProcessor
{
    public function __construct(private readonly SlaRepositoryInterface $slaRepository) {}

    /**
     * @throws \DateMalformedIntervalStringException
     * @throws BusinessException
     */
    public function handle(StoreTicketContext $context, Closure $next): mixed
    {
        $policy = $this->slaRepository->getPolicyByName($context->payload['priority']);

        if (! $policy) {
            throw new BusinessException('SLA Policy for priority {$context->priority} not found.');
        }

        $now = now();
        $firstResponseDue = (clone $now)->add(new DateInterval($policy->first_response_duration));
        $resolutionDue = (clone $now)->add(new DateInterval($policy->resolution_duration));

        TicketSla::create([
            'ticket_id' => $context->ticket->id,
            'sla_policy_id' => $policy->id,
            'first_response_due_at' => $firstResponseDue,
            'resolution_due_at' => $resolutionDue,
        ]);

        return $next($context);
    }
}

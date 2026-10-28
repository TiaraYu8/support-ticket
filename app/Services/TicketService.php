<?php

namespace App\Services;

use App\Contracts\Services\TicketServiceInterface;
use App\Core\Processors\Ticket\CalculateTicketSlaProcessor;
use App\Core\Processors\Ticket\Context\StoreTicketContext;
use App\Core\Processors\Ticket\StoreTicketProcessor;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Pipeline;

class TicketService implements TicketServiceInterface
{
    /**
     * @throws \Throwable
     */
    public function createTicket(array $payload, ?User $user): Ticket
    {
        return DB::transaction(function () use ($payload, $user) {
            $context = new StoreTicketContext(payload: $payload, user: $user);

            return Pipeline::send($context)
                ->through([
                    StoreTicketProcessor::class,
                    CalculateTicketSlaProcessor::class,
                ])
                ->thenReturn();
        });
    }
}

<?php

namespace App\Core\Processors\Ticket;

use App\Core\Processors\Ticket\Context\StoreTicketContext;
use App\Enums\TicketStatus;
use App\Models\Ticket;
use Closure;

class StoreTicketProcessor
{
    public function handle(StoreTicketContext $context, Closure $next): mixed
    {
        $context->ticket = Ticket::create([
            'user_id' => $context->user->id,
            'subject' => $context->payload['subject'],
            'description' => $context->payload['description'],
            'status' => TicketStatus::OPEN,
            'priority' => $context->payload['priority'],
        ]);

        return $next($context);
    }
}

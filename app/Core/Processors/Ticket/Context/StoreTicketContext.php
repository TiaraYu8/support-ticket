<?php

namespace App\Core\Processors\Ticket\Context;

use App\Models\Ticket;
use App\Models\TicketSla;
use App\Models\User;

class StoreTicketContext
{
    public ?TicketSla $ticketSla = null;

    public ?Ticket $ticket = null;

    public function __construct(
        public array $payload,
        public ?User $user = null,
    ) {}
}

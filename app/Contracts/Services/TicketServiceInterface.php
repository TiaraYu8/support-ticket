<?php

namespace App\Contracts\Services;

use App\Models\Ticket;
use App\Models\User;

interface TicketServiceInterface
{
    public function createTicket(array $payload, ?User $user): Ticket;
}

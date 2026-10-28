<?php

namespace App\Http\Resources;

use App\Models\Ticket;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Ticket
 */
class TicketResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'issued_by' => $this->whenLoaded('user', fn () => $this->user ? UserResource::make($this->user) : null),
            'assignee' => $this->whenLoaded('assignee', fn () => $this->assignee ? UserResource::make($this->assignee) : null),
            'subject' => $this->subject,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'ticket_sla' => $this->whenLoaded('ticketSla', fn () => $this->ticketSla ? TicketSlaResource::make($this->ticketSla) : null),
        ];
    }
}

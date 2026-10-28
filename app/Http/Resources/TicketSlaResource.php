<?php

namespace App\Http\Resources;

use App\Models\TicketSla;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin TicketSla
 */
class TicketSlaResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_response_due_at' => $this->first_response_due_at,
            'first_responded_at' => $this->first_responded_at,
            'resolution_due_at' => $this->resolution_due_at,
            'resolved_at' => $this->resolved_at,
        ];
    }
}

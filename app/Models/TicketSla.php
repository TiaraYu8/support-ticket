<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperTicketSla
 */
#[Fillable([
    'ticket_id',
    'sla_policy_id',
    'first_response_due_at',
    'first_responded_at',
    'resolution_due_at',
    'resolved_at',
])]
class TicketSla extends Model
{
    use HasUlids;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'first_response_due_at' => 'immutable_datetime',
            'first_responded_at' => 'immutable_datetime',
            'resolution_due_at' => 'immutable_datetime',
            'resolved_at' => 'immutable_datetime',
        ];
    }

    /**
     * @return BelongsTo<Ticket, $this>
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * @return BelongsTo<SlaPolicy, $this>
     */
    public function slaPolicy(): BelongsTo
    {
        return $this->belongsTo(SlaPolicy::class);
    }
}

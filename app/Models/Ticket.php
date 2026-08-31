<?php

namespace App\Models;

use App\Enums\TicketPriorities;
use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperTicket
 */
#[Fillable([
    'user_id',
    'assigned_to_id',
    'subject',
    'description',
    'status',
    'priority',
])]
class Ticket extends Model
{
    use HasUlids;

    protected function casts(): array
    {
        return [
            'status' => TicketStatus::class,
            'priority' => TicketPriorities::class,
        ];
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    /**
     * @return HasOne<TicketSla, $this>
     */
    public function ticketSla(): HasOne
    {
        return $this->hasOne(TicketSla::class);
    }
}

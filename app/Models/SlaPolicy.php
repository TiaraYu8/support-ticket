<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperSlaPolicy
 */
#[Fillable(['name', 'first_response_duration', 'resolution_duration'])]
class SlaPolicy extends Model
{
    /**
     * @return Attribute<mixed, mixed>
     */
    protected function firstResponseDuration(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => CarbonInterval::fromString(is_string($value) ? $value : ''),
            set: fn (mixed $value) => $value instanceof CarbonInterval ? $value->spec() : $value,
        );
    }

    /**
     * @return Attribute<mixed, mixed>
     */
    protected function resolutionDuration(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => CarbonInterval::fromString(is_string($value) ? $value : ''),
            set: fn (mixed $value) => $value instanceof CarbonInterval ? $value->spec() : $value,
        );
    }

    /**
     * @return HasMany<TicketSla, $this>
     */
    public function ticketSlas(): HasMany
    {
        return $this->hasMany(TicketSla::class);
    }
}

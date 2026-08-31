<?php

namespace App\Enums;

enum TicketStatus: string
{
    case OPEN = 'open';

    case in_progress = 'in_progress';

    case resolved = 'resolved';

    case closed = 'closed';

    public function getLabel(): string
    {
        return match ($this) {
            self::OPEN => __('custom.open'),
            self::in_progress => __('custom.in_progress'),
            self::resolved => __('custom.resolved'),
            self::closed => __('custom.closed'),
        };
    }
}

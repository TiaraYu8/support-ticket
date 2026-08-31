<?php

namespace App\Enums;

enum TicketPriorities: string
{
    case HIGH = 'high';

    case NORMAL = 'normal';

    case LOW = 'low';

    case CRITICAL = 'critical';
}

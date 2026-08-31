<?php

namespace App\Enums;

enum RolesEnum: string
{
    case CLIENT = 'client';
    case SUPPORT_AGENT = 'support_agent';

    public function getLabels(): string
    {
        return match ($this) {
            self::CLIENT => __('custom.client'),
            self::SUPPORT_AGENT => __('custom.support_agent'),
        };
    }
}

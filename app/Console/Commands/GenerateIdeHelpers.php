<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class GenerateIdeHelpers extends Command
{
    /** @var string */
    protected $signature = 'ide-helper:all';

    /** @var string */
    protected $description = 'Generate the IDE helpers';

    public function handle(): int
    {
        if ($this->getLaravel()->environment('local') === false) {
            return self::SUCCESS;
        }

        $this->call('ide-helper:models', ['-M' => true, '-R' => true, '-p' => true]);
        $this->call('ide-helper:meta');
        $this->call('ide-helper:generate');

        return self::SUCCESS;
    }
}

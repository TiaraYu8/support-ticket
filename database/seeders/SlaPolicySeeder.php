<?php

namespace Database\Seeders;

use App\Enums\TicketPriorities;
use App\Models\SlaPolicy;
use Illuminate\Database\Seeder;

class SlaPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            [
                'name' => TicketPriorities::CRITICAL->value,
                'first_response_duration' => 'PT15M',
                'resolution_duration' => 'PT2H',
            ],
            [
                'name' => TicketPriorities::HIGH->value,
                'first_response_duration' => 'PT1H',
                'resolution_duration' => 'PT8H',
            ],
            [
                'name' => TicketPriorities::NORMAL->value,
                'first_response_duration' => 'PT4H',
                'resolution_duration' => 'P2D',
            ],
            [
                'name' => TicketPriorities::LOW->value,
                'first_response_duration' => 'P1D',
                'resolution_duration' => 'P5D',
            ],
        ];

        foreach ($policies as $policy) {
            SlaPolicy::firstOrCreate(
                ['name' => $policy['name']],
                $policy
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::factory()
            ->count(10)
            ->has(
                User::factory()
                    ->count(5)
                    ->state(fn () => [
                        'role' => RolesEnum::CLIENT->value,
                    ]),
                'users'
            )
            ->create();

        $testingOrganization = Organization::factory()->create([
            'name' => 'Client B.V.',
        ]);

        User::factory()->create([
            'name' => 'Testing Client',
            'email' => 'client@example.com',
            'role' => RolesEnum::CLIENT->value,
            'organization_id' => $testingOrganization->id,
        ]);
    }
}

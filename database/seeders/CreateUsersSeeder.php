<?php

namespace Database\Seeders;

use App\Modules\User\Enums\UserRoleEnum;
use Illuminate\Database\Seeder;
use App\Modules\User\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'attendant@teste.com',
            'role' => UserRoleEnum::ATTENDANT->value
        ]);

        User::factory()->create([
            'email' => 'receptionist@teste.com',
            'role' => UserRoleEnum::RECEPTIONIST->value
        ]);

        User::factory()->create([
            'email' => 'doctor@teste.com',
            'role' => UserRoleEnum::DOCTOR->value
        ]);

        User::factory()->create([
            'email' => 'doctor2@teste.com',
            'role' => UserRoleEnum::DOCTOR->value
        ]);
    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role ADMIN
        $adminRole = Role::updateOrCreate(
            ['code' => 'ADMIN'],
            ['name' => 'Administrator']
        );

        // Buat akun admin
        User::updateOrCreate(
            ['email' => 'admin@bpr.com'],
            [
                'password'  => Hash::make('password'),
                'role_id'   => $adminRole->id,
                'is_active' => true,
            ]
        );

        $this->command->info('✅ Akun admin dibuat: admin@bpr.com / password');
    }
}

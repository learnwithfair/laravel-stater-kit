<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'               => 'Admin',
            'email'              => 'admin@gmail.com',
            'email_verified_at'  => now(),
            'password'           => Hash::make('12345678'),
            'role'               => 'admin',
            'image'              => null,
            'profile_photo_path' => null,
            'is_enabled'         => true,
        ]);
        User::create([
            'name'               => 'Rahat',
            'email'              => 'sv.rahat99@gmail.com',
            'email_verified_at'  => now(),
            'password'           => Hash::make('12345678'),
            'role'               => 'admin',
            'image'              => null,
            'profile_photo_path' => null,
            'is_enabled'         => true,
        ]);

        User::create([
            'name'               => 'User',
            'email'              => 'user@gmail.com',
            'email_verified_at'  => now(),
            'password'           => Hash::make('12345678'),
            'role'               => 'user',
            'image'              => null,
            'profile_photo_path' => null,
            'is_enabled'         => true,
        ]);
    }
}

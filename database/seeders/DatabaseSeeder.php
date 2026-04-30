<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@sijaring.com',
            'password' => Hash::make('password123'),
        ]);

        $this->call([
            ProdukSeeder::class,
        ]);
    }
}

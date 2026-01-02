<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Elise',
            'email' => 'elise@admin.com',
            'phone' => '028445466',
            'role' => 1,
            'password' => Hash::make('password'),
        ]);

        User::firstOrCreate([
            'name' => 'Thomas',
            'email' => 'thomas@benevole.com',
            'phone' => '028445465',
            'role' => 0,
            'password' => Hash::make('password'),
        ]);

        Animal::factory(30)->create();
        Message::factory(10)->create();
    }
}

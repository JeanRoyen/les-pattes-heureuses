<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Elise',
            'email' => 'elise@admin.com',
            'role' => 1,
            'password' => 'test',
        ]);

        User::factory()->create([
            'name' => 'Thomas',
            'email' => 'thomas@benevole.com',
            'role' => 0,
            'password' => 'test',
        ]);

        Animal::factory(10)->create();
        Message::factory(10)->create();
    }
}

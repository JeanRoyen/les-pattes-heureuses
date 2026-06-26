<?php

namespace Database\Seeders;

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
            'isAdmin' => 1,
            'password' => Hash::make('password'),
        ]);

        User::firstOrCreate([
            'name' => 'Thomas',
            'email' => 'thomas@benevole.com',
            'phone' => '028445465',
            'isAdmin' => 0,
            'password' => Hash::make('password'),
        ]);

        $this->call(ProductionSpeciesSeeder::class);
        $this->call(ProductionBreedSeeder::class);
        $this->call(ProductionAnimalSeeder::class);
        $this->call(ProductionMessageSeeder::class);
    }
}

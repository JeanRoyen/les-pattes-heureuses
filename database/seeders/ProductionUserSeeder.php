<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductionUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Elise',
                'email' => 'elise@admin.com',
                'phone' => '028445466',
                'isAdmin' => true,
            ],
            [
                'name' => 'Thomas',
                'email' => 'thomas@benevole.com',
                'phone' => '028445465',
                'isAdmin' => false,
            ],
            [
                'name' => 'Sophie',
                'email' => 'sophie@benevole.com',
                'phone' => '0471000001',
                'isAdmin' => false,
            ],
            [
                'name' => 'Lucas',
                'email' => 'lucas@benevole.com',
                'phone' => '0471000002',
                'isAdmin' => false,
            ],
            [
                'name' => 'Camille',
                'email' => 'camille@benevole.com',
                'phone' => '0471000003',
                'isAdmin' => false,
            ],
            [
                'name' => 'Nicolas',
                'email' => 'nicolas@benevole.com',
                'phone' => '0471000004',
                'isAdmin' => false,
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'phone' => $user['phone'],
                    'isAdmin' => $user['isAdmin'],
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}

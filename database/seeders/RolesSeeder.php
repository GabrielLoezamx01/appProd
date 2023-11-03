<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name'   => 'cliente',
                'estado' => '1',
            ],
            [
                'name'      => 'vendedor',
                'estado' => '1',
            ]
        ];
        Roles::insert($roles);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            'email'     => 'master@echamelamano.com',
            'name'      => 'Admin',
            'password'  => Hash::make('1234567890'),
            'role_id'   => 1,
            'status'    => '1',
        ];
        User::create($users);
    }
}

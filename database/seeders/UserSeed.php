<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'SuperAdmin', 'email' => 'admin@localhost.com', 'password' => Hash::make('ASDqwe123456'), 'role_id' => 1],
            ['name' => 'Administración', 'email' => 'administracion@localhost.com', 'password' => Hash::make('administracion12345'), 'role_id' => 2],
            ['name' => 'Guarda', 'email' => 'guarda1@localhost.com', 'password' => Hash::make('guarda12345'), 'role_id' => 3],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeed extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert(
            ['name' => 'SuperAdmin'],
            ['name' => 'Administración'],
            ['name' => 'Guarda'],
        );
    }
}

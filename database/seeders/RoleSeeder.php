<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Administrator, has access to everything',
        ]);

        RoleUser::create([
            'role_id' => 1,
            'user_id' => 1,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Models\Role::create([
            'name' => 'isAdmin'
        ]);
        $role1 = \App\Models\Role::create([
            'name' => 'isTranslater'
        ]);
        $role2 = \App\Models\Role::create([
            'name' => 'isEmailVerified'
        ]);
        $role3 = \App\Models\Role::create([
            'name' => 'isVerified'
        ]);
    }
}

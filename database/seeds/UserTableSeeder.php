<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ownerRole = Role::where('name', 'owner')->first();
        $adminRole = Role::where('name', 'admin')->first();

        $owner = User::create([
            'name' => 'Owner',
            'email' => 'owner@fisioapp.com',
            'password' => Hash::make('owner')
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@fisioapp.com',
            'password' => Hash::make('admin')
        ]);

        $owner->roles()->attach($ownerRole);
        $admin->roles()->attach($adminRole);
    }
}

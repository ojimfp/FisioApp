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
            'name' => 'Saya Owner',
            'username' => 'owner',
            'email' => 'owner@fisioapp.com',
            'no_hp' => '081234567890',
            'password' => Hash::make('owner123'),
            'pekerjaan' => 'Fisioterapis'
        ]);

        $admin = User::create([
            'name' => 'Saya Admin',
            'username' => 'admin',
            'email' => 'admin@fisioapp.com',
            'no_hp' => '089876543210',
            'password' => Hash::make('admin123'),
            'pekerjaan' => 'Administrasi'
        ]);

        $owner->roles()->attach($ownerRole);
        $admin->roles()->attach($adminRole);
    }
}

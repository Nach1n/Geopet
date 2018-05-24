<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class InitialConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();

        Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador'
        ]);

        Role::create([
            'name' => 'client',
            'display_name' => 'Cliente'
        ]);

        User::create([
            'name' => 'Byron',
            'lastname' => 'Oyarzún',
            'email' => 'byron@unab.cl',
            'phone_number' => '56945896532',
            'password' => bcrypt('unab.toor'),
            'role_id' => 1
        ]);
    }
}

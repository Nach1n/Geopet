<?php

use App\User;
use App\Role;
use App\Option;
use App\Faq;
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
        Option::truncate();
        Faq::truncate();

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

        User::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@unab.cl',
            'phone_number' => '56945896532',
            'password' => bcrypt('unab.toor'),
            'role_id' => 2
        ]);

        Option::create([
            'app_name' => 'GeoPet',
            'app_description' => 'La solución inteligente para buscar a tu mascota.',
            'app_email' => 'contacto@geopet.ga',
            'app_phone' => '600 600 300',
            'app_address_street' => 'Antonio Varas',
            'app_address_number' => '880',
            'app_address_commune' => 'Providencia',
            'app_address_country' => 'Chile',
        ]);

        Faq::create([
            'title' => '¿Qué es GeoPet?',
            'description' => 'GeoPet es un servicio que permite localizar en tiempo real a tu mascota.',
            'published' => 1,
        ]);
    }
}

<?php

use App\User;
use App\Role;
use App\Option;
use App\Faq;
use App\Product;
use App\Pet;
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
        Product::truncate();
        Pet::truncate();

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

        Product::create([
            'brand_name' => 'TKSTAR',
            'model_name' => '909',
            'network'=> 'GPRS/GPS',
            'cpu' => 'SRIF 3',
            'battery' => '3.7V 700-850mAh Li-ion battery',
            'car_charger' => '12—24V input 5V output',
            'wall_charger' => '110-220V input 5V output',
            'certificate' => 'CE Certificate',
            'item_size' => '47mmx50mmx15mm',
            'weight' => 44,
            'comunication_protocol' => 'TCP',
            'band' => '850/900/1800/1900Mhz',
            'gps_module'=> 'MTK',
            'gps_chip' => 'SRIF 3',
            'gps_accuracy'=> 5,
            'operation_temp' => '-20°C to +55°C',
            'standby' => 300,
            'battery_life' => 30,
            'price' => 49900,
            'published' => 1
        ]);

        Pet::create([
            'name' => 'Cholito',
            'birth_day' => '2015-03-29',
            'specie' => 'Perro',
            'sex' => 1,
            'race' => 'Poodle',
            'color' => 'Blanco',
            'reproductive_status' => 1,
            'description' => 'Lorem ipsum...',
            'user_id' => 2
        ]);

    }
}

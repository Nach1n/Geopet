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
            'telegram_user' => 'ByronOyarzun',
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

        for($i = 1; $i < 60; $i++)
        {
            $user = User::create([
                'name' => 'GeoPet',
                'lastname' => 'Example',
                'email' => 'example'.$i.'@geopet.ga',
                'phone_number' => '56945896532',
                'password' => bcrypt('unab.toor'),
                'role_id' => 2
            ]);

            Pet::create([
                'name' => 'GeoPet',
                'birth_day' =>'2015-03-03',
                'specie' => 'Can',
                'race' => 'Poodle',
                'sex' => 1,
                'color' => 'Blanco',
                'reproductive_status' => 1,
                'description' => 'GeoPet Example',
                'user_id' => $user->id
            ]);
        }

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

        Faq::create([
            'title' => '¿Que alcance tiene el servicio?',
            'description' => 'GeoPet cubre todo el territorio nacional. Es decir, si tú vives en Santiago y tu perro por algún motivo está en La Serena, podrás ubicarlo utilizando la app de GeoPet. Los únicos requisitos necesarios para ubicar a tu mascota que utiliza GeoPet es que esté en un lugar que tenga cobertura de celular y que tenga batería.',
            'published' => 1,
        ]);

        Faq::create([
            'title' => '¿Cuánto dura la batería?',
            'description' => 'La batería de nuestros dispositivos GeoPet puede llegar a durar en promedio de 5 a 7 días y también dependerá de que tan seguido consultes la ubicación de tu mascota.',
            'published' => 1
        ]);

        Faq::create([
            'title' => '¿Funciona con todos los teléfonos y computadoras?',
            'description' => 'La aplicación web de GeoPet funciona en todos los los dispositivos moviles y tambien puedes acceder al servicio de monitoreo de GeoPet a través de tu computador utilizando los navegadores web como Chrome, Firefox, Safari y Edge.',
            'published' => 1
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
            'price' => 24900,
            'published' => 1
        ]);

        Product::create([
            'brand_name' => 'Findarling',
            'model_name' => 'V30',
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
            'price' => 19900,
            'published' => 1
        ]);

        Product::create([
            'brand_name' => 'Ertengtec',
            'model_name' => 'S1',
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
            'price' => 36900,
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

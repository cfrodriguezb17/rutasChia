<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
use App\Models\Ride;
use App\Models\Student;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('schools')->insert([
            'name' => 'Nacional Diversificado', 
            'd_code' => '125175000493',
            'address' => 'Carrera 6 #8 - 18',
            'phone' => '8630222',
            'email' => 'contacto@conaldi.edu.co'
        ]);
        DB::table('schools')->insert([
            'name' => 'Jose Joaquin Casas', 
            'd_code' => '125175000299',
            'address' => 'Avenida Bolivar Calle 18',
            'phone' => '8626570',
            'email' => 'iedjjcasaschia@gmail.com'
        ]);
        DB::table('schools')->insert([
            'name' => 'San Jóse María Escriva de Balaguer', 
            'd_code' => '225175000137',
            'address' => 'Avenida Pradilla 4E #-134',
            'phone' => '8620399',
            'email' => 'admin@escrivadebalaguer.edu.co'
        ]);
        User::factory(5)->create();
        Car::factory(5)->create();
        DB::table('rides')->insert([
            'user' => '1', 
            'car' => '1',
            'number' => 'No se le ha asignado una ruta',
        ]);
        Ride::factory(4)->create();
        //School::factory(3)->create();
        Student::factory(10)->create();
    }
}

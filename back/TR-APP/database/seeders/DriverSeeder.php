<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use Faker\Generator as Faker;
class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $fake)
    {
        //
        for ($i = 0; $i < 10; $i++) {
            $driver = new Driver();
            $driver->string('nom');
            $driver->string('prenom');
            $driver->string('email')->unique();
            $driver->integer('phone');
            $driver->integer('matricule');
            $driver->float('conges');
            $driver->save();
        }

    }
}

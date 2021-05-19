<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CittaSeeder::class,
            Info_generaliSeeder::class,
            Info_meteoSeeder::class
        ]);
    }
}
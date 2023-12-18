<?php

namespace Database\Seeders;

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
            ShopSeeder::class,
            OrderSeeder::class,
            NomenclatureSeeder::class,
            CartSeeder::class,
            CreditFactory::class,
            CustomerSeeder::class
        ]);
    }
}

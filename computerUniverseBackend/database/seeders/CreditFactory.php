<?php

namespace Database\Seeders;

use App\Models\Credit;
use Illuminate\Database\Seeder;

class CreditFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credit::factory(5)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Nomenclature;
use Illuminate\Database\Seeder;

class NomenclatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nomenclature::factory(10)->create();
    }
}

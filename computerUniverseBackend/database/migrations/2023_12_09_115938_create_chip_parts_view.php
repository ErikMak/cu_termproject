<?php

use Illuminate\Database\Migrations\Migration;
use Staudenmeir\LaravelMigrationViews\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateChipPartsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $query = DB::table('parts')
            ->select('parts.model_number', 'parts.name', 'parts.manufacturer',
                'parts.price', 'parts.warranty', 'parts.category')
            ->join('nomenclature', 'nomenclature.model_number', '=', 'parts.model_number')
            ->where([
                ['nomenclature.is_exist', true],
                ['parts.price', '<', 1000]
            ])
            ->orderBy('parts.price');

        Schema::createView('chip_parts_view', $query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropViewIfExists('chip_parts_view');
    }
}

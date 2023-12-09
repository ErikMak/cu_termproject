<?php

use Illuminate\Database\Migrations\Migration;
use Staudenmeir\LaravelMigrationViews\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateExistsPartsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $query = DB::table('parts')
            ->select('parts.model_number', 'parts.name',
            'parts.price', 'parts.warranty', 'parts.category')
            ->join('nomenclature', 'nomenclature.model_number', '=', 'parts.model_number')
            ->where('nomenclature.is_exist', '=', true);

        Schema::createView('exists_parts_view', $query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropViewIfExists('exists_parts_view');
    }
}

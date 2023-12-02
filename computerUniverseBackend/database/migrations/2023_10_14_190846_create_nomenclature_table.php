<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomenclatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomenclature', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_number')->unsigned();
            $table->index('model_number', 'part_nomenclature_idx');
            $table->foreign('model_number', 'part_nomenclature_fk')->on('parts')->references('model_number');
            $table->integer('warehouse')->unsigned();
            $table->index('warehouse', 'warehouse_nomenclature_idx');
            $table->foreign('warehouse', 'warehouse_nomenclature_fk')->on('warehouses')->references('id');
            $table->boolean('is_exist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nomenclature');
    }
}

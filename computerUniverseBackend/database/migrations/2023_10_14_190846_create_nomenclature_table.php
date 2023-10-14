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
            $table->integer('warehouse')->unsigned();
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

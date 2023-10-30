<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->increments('model_number');
            $table->string('name', 30);
            $table->string('manufacturer', 20);
            $table->integer('price')->unsigned();
            $table->string('warranty', 18);
            $table->integer('device_id')->unsigned();
            $table->index('device_id', 'software_part_idx');
            $table->foreign('device_id', 'software_part_fk')->on('software')->references('device_id');
            $table->string('category', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}

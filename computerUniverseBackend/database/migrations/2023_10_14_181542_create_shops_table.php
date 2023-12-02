<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->integer('INN')->unsigned();
            $table->primary('INN');
            $table->integer('firm')->unsigned();
            $table->index('firm', 'firm_shop_idx');
            $table->foreign('firm', 'firm_shop_fk')->on('firms')->references('INN');
            $table->string('city', 20);
            $table->string('address', 30);
            $table->integer('purchasing_manager')->unsigned();
            $table->index('purchasing_manager', 'manager_shop_idx');
            $table->foreign('purchasing_manager', 'manager_shop_fk')->on('managers')->references('manager_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}

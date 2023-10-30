<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->index('order_id', 'order_cart_idx');
            $table->foreign('order_id', 'order_cart_fk')->on('orders')->references('order_id');
            $table->integer('model_number')->unsigned();
            $table->index('model_number', 'part_cart_idx');
            $table->foreign('model_number', 'part_cart_fk')->on('parts')->references('model_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}

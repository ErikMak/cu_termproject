<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('bid_id');
            $table->integer('order_id')->unsigned();
            $table->index('order_id', 'order_credit_idx');
            $table->foreign('order_id', 'order_credit_fk')->on('orders')->references('order_id');
            $table->integer('init_payment')->unsigned();
            $table->integer('payment')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}

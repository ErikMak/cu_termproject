<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->integer('customer')->unsigned();
            $table->index('customer', 'manager_customer_idx');
            $table->foreign('customer', 'manager_customer_fk')->on('managers')->references('manager_id');
            $table->string('address', 30);
            $table->string('phone', 12);
            $table->integer('order_id')->unsigned();
            $table->index('order_id', 'order_customer_idx');
            $table->foreign('order_id', 'order_customer_fk')->on('orders')->references('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

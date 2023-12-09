<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->date('order_date');
            $table->integer('operator')->unsigned();
            $table->index('operator', 'staff_order_idx');
            $table->foreign('operator', 'staff_order_fk')->on('staff')->references('staff_id');
            $table->string('status', 15)->default('Оплачено');
            $table->integer('delivery_time')->unsigned();
            $table->integer('sum')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function() {
            \Illuminate\Support\Facades\DB::statement("DROP TABLE orders CASCADE;");
        });
    }
}

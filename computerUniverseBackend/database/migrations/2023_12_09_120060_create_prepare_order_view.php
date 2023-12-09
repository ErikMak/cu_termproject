<?php

use Illuminate\Database\Migrations\Migration;
use Staudenmeir\LaravelMigrationViews\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreatePrepareOrderView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $query = DB::table('orders')
            ->select('orders.order_id', 'orders.order_date',
            'orders.status', 'orders.delivery_time',
                DB::raw("concat(staff.lastname, ' ', staff.firstname) AS fullname"))
            ->join('staff', 'staff.staff_id', '=', 'orders.operator')
            ->where('orders.status', '=', 'Собирается');

        Schema::createView('prepare_order_view', $query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropViewIfExists('prepare_order_view');
    }
}

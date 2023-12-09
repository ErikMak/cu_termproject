<?php

use Illuminate\Database\Migrations\Migration;
use Staudenmeir\LaravelMigrationViews\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFreeStaffView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $query = DB::table('staff')
            ->select('staff.staff_id')
            ->leftJoin('orders', 'orders.operator', '=', 'staff.staff_id')
            ->whereNull('orders.operator');

        Schema::createView('free_staff_view', $query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropViewIfExists('free_staff_view');
    }
}

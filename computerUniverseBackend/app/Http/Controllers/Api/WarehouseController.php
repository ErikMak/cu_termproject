<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Warehouse\WarehouseResource;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends BaseContoller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $warehouses = Warehouse::with('staff')->get();

        return $this->sendResponse(WarehouseResource::collection($warehouses));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $warehouse = Warehouse::with('staff')->find($id);

        if(is_null($warehouse)) {
            return $this->sendError('Склад не найден');
        }

        return $this->sendResponse(new WarehouseResource($warehouse));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}

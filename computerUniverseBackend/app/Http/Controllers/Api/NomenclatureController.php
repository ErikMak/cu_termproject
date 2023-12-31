<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Nomenclature\NomenclatureResource;
use App\Models\Nomenclature;
use Illuminate\Http\Request;

class NomenclatureController extends BaseContoller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Nomenclature  $nomenclature
     * @return \Illuminate\Http\Response
     */
    public function show(Nomenclature $nomenclature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nomenclature  $nomenclature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nomenclature $nomenclature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nomenclature  $nomenclature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nomenclature $nomenclature)
    {
        //
    }

    public function print() {
        $nomenclature = Nomenclature::with('warehouses')
            ->with('parts')->get();

        return $this->sendResponse(NomenclatureResource::collection($nomenclature));
    }
}

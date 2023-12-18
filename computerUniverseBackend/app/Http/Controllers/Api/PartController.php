<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\PartFilter;
use App\Http\Requests\StorePartRequest;
use App\Http\Resources\Part\PartResource;
use App\Http\Resources\Part\PartWarehouseResource;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends BaseContoller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::all();

        return $this->sendResponse(PartResource::collection($parts));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartRequest $request)
    {
        $validated = $request->validated();

        $part = Part::create($validated);

        return $this->sendResponse(new PartResource($part), 'Компонент успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $model_number)
    {
        $part = Part::find($model_number);

        if(is_null($part)) {
            return $this->sendError('Компонент не найден');
        }

        return $this->sendResponse(new PartResource($part));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(StorePartRequest $request, string $model_number)
    {
        $validated = $request->validated();

        $part = Part::find($model_number);

        $part->update($validated);

        return $this->sendResponse(new PartResource($part), 'Компонент успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $model_number)
    {
        $part = Part::find($model_number);
        $part->delete();

        return response('Компонент успешно удален!', 204);
    }

    public function find(PartFilter $filter) {
        $parts = Part::filter($filter)->get();

        return $this->sendResponse(PartWarehouseResource::collection($parts));
    }
}

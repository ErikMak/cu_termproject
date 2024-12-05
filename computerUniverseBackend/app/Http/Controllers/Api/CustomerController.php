<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\Customer\CustomerOrderManagerResource;
use App\Http\Resources\Customer\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends BaseContoller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('managers')->with('orders')->get();

        return $this->sendResponse(CustomerOrderManagerResource::collection($customers));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();

        DB::select('call insert_customer(?, ?, ?)', array(
            $validated['customer'],
            $validated['address'],
            $validated['phone']
        ));

        return $this->sendResponse($validated, 'Заказчик успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

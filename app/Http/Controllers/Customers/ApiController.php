<?php

namespace App\Http\Controllers\Customers;

use App\Customer;
use App\Http\Resources\Customer as CustomerResource;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index()
    {
        return CustomerResource::collection(Customer::paginate(10));
    }

    public function store(Request $request)
    {
        return new CustomerResource(Customer::create($this->validateForm($request)));
    }

    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    public function update(Request $request, Customer $customer)
    {   
        $customer->update($this->validateForm($request));
        $customer->save();
        return new CustomerResource($customer);
    }

    public function destroy($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return new CustomerResource($customer);
    }


    public function validateForm ($request) {
        // dd($request);
        $request->validate([
            'email' => 'required|unique:customers,email,'.$request->id,
            'phone_no' => 'required|numeric'
        ]);
        return Arr::except($request->all(), ['_token', '_method', 'id']); 
    }

}

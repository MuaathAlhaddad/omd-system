<?php

namespace App\Http\Controllers\Customers;

use App\Customer;
use App\Http\Resources\Customer as CustomerResource;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Invoice;

class ApiController extends Controller
{
    public function index()
    {
        $invoice = Invoice::latest()->first();
        return CustomerResource::collection(Customer::all())
        ->additional(['meta' => [
                        'invoice_id' =>  $invoice ? $invoice->id : 0
                    ]]);
    }

    public function store(Request $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    public function update(Request $request, Customer $customer)
    {   
        $customer->update($request->all());
        $customer->save();
    
        return new CustomerResource($customer);
    }

    public function destroy($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return new CustomerResource($customer);
    }

}

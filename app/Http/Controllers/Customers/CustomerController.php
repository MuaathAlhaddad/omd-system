<?php

namespace App\Http\Controllers\Customers;

use App\Customer;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
        // return view('customers.index', ['customers' => Customer::paginate(10)]);
    }

    public function create()
    {
        return view('customers.create'); 
    }

    public function store(Request $request)
    {
        Customer::create($this->validateForm($request));
        return redirect(route('customers.index'))->with('success', 'Customer Created Successfully');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', ['customer' => $customer]);
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request)
    {   
        $customer = Customer::where('id', $request->id)
        ->update($this->validateForm($request));
        return redirect(route('customers.index'))->with('success', 'Cusotmer Updated Successfully');
    }

    public function destroy($id, Request $request)
    {
        $customer = Customer::where('id', $id)
                ->delete();
        return redirect(route('customers.index'))->with('success', 'Cusotmer Deleted Successfully');
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

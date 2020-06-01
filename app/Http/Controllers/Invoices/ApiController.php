<?php

namespace App\Http\Controllers\Invoices;

use App\Invoice;
use App\Http\Resources\Invoice as InvoiceResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class ApiController extends Controller
{
    public function index()
    {
        return InvoiceResource::collection(Invoice::all());
    }

    public function store(Request $request)
    {
        $request->merge([
            'invoice_date' => date("Y-m-d", strtotime(request('invoice_date'))), 
            'payment_due' => date("Y-m-d", strtotime(request('payment_due'))), 
        ]);
        return new InvoiceResource(Invoice::create($request->all()));
    }

    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    public function update(Request $request, Invoice $invoice)
    {   
        $invoice->update($request->all());
        $invoice->save();
    
        return new InvoiceResource($invoice);
    }

    public function destroy($id, Request $request)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return new InvoiceResource($invoice);
    }
}

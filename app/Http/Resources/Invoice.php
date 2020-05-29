<?php

namespace App\Http\Resources;
use App\Http\Resources\Customer as CustomerResource;
use App\Http\Resources\Currency as CurrencyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Invoice extends JsonResource
{
    public function toArray($request)
    { 
        return [
            'id'=> $this->id,
            'invoice_no' => $this->id,
            'amount_due'=> $this->amount_due,
            'invoice_date'=> $this->invoice_date,
            'payment_due'=> $this->payment_due,
            'status'=> $this->status,
            'summary'=> $this->summary,
            'customer'=> new CustomerResource($this->customer),
            'currency'=> new CurrencyResource($this->currency),
            'notes'=> $this->notes,
            'footer'=> $this->footer,
        ];
    }
}

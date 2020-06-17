<?php

namespace App;

use App\Item;
use App\Currency;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded=[''];
    public $timestamps = false;

    
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class, 'invoice_item');
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }
}

<?php

namespace App;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[''];
    public $timestamps = false;
    
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}

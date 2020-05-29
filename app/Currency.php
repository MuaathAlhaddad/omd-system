<?php

namespace App;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}

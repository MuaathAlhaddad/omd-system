<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Currency;
use App\Invoice;
use App\Customer;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'customer_id'   => factory(Customer::class), 
        'invoice_no'   => '10000021', 
        'invoice_date'   => $faker->date,
        'payment_due'   => $faker->date,
        'status'      => 'draft',  
        'amount_due'      => 20,  
        'currency_id'      => factory(Currency::class), 
        'summary'         => 'The summary of the invoice', 
        'notes'         => 'This is the the Invoice notes', 
        'footer'        => 'Footer of the invoice',
        'created_at' => Carbon::now()->format('Y-m-d'),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'customer_id'   => factory(Customer::class), 
        'title'         => $faker->title,
        'invoice_date'   => now(),
        'payment_due'   => $faker->date, 
        'notes'         => $faker->sentence, 
        'approval'      => $faker->boolean, 
        'footer'        => $faker->sentence
    ];
});

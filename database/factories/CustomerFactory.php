<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $date = Carbon::now();
    return [
        'first_name' => $faker->firstName, 
        'last_name' => $faker->lastName,
        'phone_no'  => $faker->phoneNumber,
        'address'   => $faker->address, 
        'email'     => $faker->unique()->safeEmail, 
        'created_at' => $date->toDateString(),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName, 
        'last_name' => $faker->lastName,
        'phone_no'  => $faker->phoneNumber,
        'address'   => $faker->address, 
        'email'     => $faker->unique()->safeEmail 
    ];
});

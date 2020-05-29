<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company_details;
use Faker\Generator as Faker;

$factory->define(Company_details::class, function (Faker $faker) {
    return [
        'name' => 'WMS Discovery',
        'address' => 'Empire City Damansara, C19-13A Block C, Jalan Damansara, PJU 8, 47820 Petaling Jaya, Selangor',
        'logo' => 'logo',
        'phone_no' => '03-7621 1902',
        'email' => 'discovery@wms.my'
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\ItemCategory;
use Faker\Generator as Faker;

$factory->define(ItemCategory::class, function (Faker $faker) {
    return [
        'title' => 'product',
        'desc' => 'this explains the item category',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ];
});
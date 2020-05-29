<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Carbon\Carbon;
use App\ItemCategory;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => 'items title',
        'desc' => 'items desc',
        'price' => 12.1,
        'item_categories_id' => factory(ItemCategory::class),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ];
});
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\Invoice;
use Carbon\Carbon;
use App\InvoiceItem;
use Faker\Generator as Faker;

$factory->define(InvoiceItem::class, function (Faker $faker) {
    return [
        'invoice_id' => factory(Invoice::class),
        'item_id' => factory(Item::class),
        'quantity' => 2,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ];
});
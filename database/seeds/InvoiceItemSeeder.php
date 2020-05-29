<?php

use App\InvoiceItem;
use Illuminate\Database\Seeder;

class InvoiceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(InvoiceItem::class, 5)->create(['invoice_id' => 1, 'item_id' => 1]);
    }
}

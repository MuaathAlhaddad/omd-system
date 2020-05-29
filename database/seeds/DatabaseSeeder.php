<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CustomerSeeder::class, CurrencySeeder::class, InvoiceSeeder::class, CompanyDetailsSeeder::class, ItemCategorySeeder::class, ItemSeeder::class,  InvoiceItemSeeder::class]);
    }
}

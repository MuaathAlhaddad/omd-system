<?php

use App\Currency;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Currency::create(
                [
                    'name'=> 'United States Dollar',
                    'code'=>'USD',
                    'symbol' => '$',            
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );

            Currency::create(
                [
                    'name'=> 'Malaysian Ringgi',
                    'code'=>'MYR',
                    'symbol' => 'RM',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );
    }
}

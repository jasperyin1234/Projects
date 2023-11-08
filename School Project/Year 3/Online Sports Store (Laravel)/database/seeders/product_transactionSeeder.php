<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_transactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_transaction')->insert([
            [
                'product_id' => '2',
                'transaction_id' => '1',
                'transaction_quantity' => 1,
            ],
            [
                'product_id' => '3',
                'transaction_id' => '1',
                'transaction_quantity' => 1,
            ],
            [
                'product_id' => '4',
                'transaction_id' => '2',
                'transaction_quantity' => 2,
            ],
            [
                'product_id' => '11',
                'transaction_id' => '3',
                'transaction_quantity' => 1,
            ],
            [
                'product_id' => '1',
                'transaction_id' => '4',
                'transaction_quantity' => 1,
            ],
            [
                'product_id' => '25',
                'transaction_id' => '4',
                'transaction_quantity' => 1,
            ],
            [
                'product_id' => '21',
                'transaction_id' => '4',
                'transaction_quantity' => 1,
            ]
        ]);
    }
}

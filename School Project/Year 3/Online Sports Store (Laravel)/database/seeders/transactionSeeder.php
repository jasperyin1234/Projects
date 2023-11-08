<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class transactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction')->insert([
            [
                'transaction_date' => Carbon::now()->subDays(rand(1, 60)),
                'delivery_address' => 'address1',
                'total_amount' => 147.00, // Puma Flex + Puma Flex 2.0
                'user_id' => 1
            ],
            [
                'transaction_date' => Carbon::now()->subDays(rand(1, 60)),
                'delivery_address' => 'address1',
                'total_amount' => 138.00, // Neo Short x 2 
                'user_id' => 1
            ],
            [
                'transaction_date' => Carbon::now()->subDays(rand(1, 60)),
                'delivery_address' => 'address2',
                'total_amount' => 539.00, // Nike Dunk Low
                'user_id' => 2
            ],
            [
                'transaction_date' => Carbon::now()->subDays(rand(1, 60)),
                'delivery_address' => 'address2',
                'total_amount' => 608.00, // Kappa Style + Nike Go + Puma Fuse
                'user_id' => 2
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShoeSize;
use App\Models\ClothesSize;

class sizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 16; $i++) {
            ClothesSize::factory()->count(1)->create([
                'product_id' => $i,
            ]);
        }

        for ($i = 17; $i <= 32; $i++) {
            ShoeSize::factory()->count(1)->create([
                'product_id' => $i,
            ]);
        }
    }
}

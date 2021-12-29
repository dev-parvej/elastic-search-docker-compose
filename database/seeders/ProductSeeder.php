<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 1000; $i++) {
            dump($i);
            Product::query()->insert(Product::factory(1000)->make()->toArray());
        }
    }
}

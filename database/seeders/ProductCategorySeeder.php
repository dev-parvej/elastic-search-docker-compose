<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        try {
            $faker = resolve(\Faker\Generator::class);
            $categories = Category::query()
                ->select('id')
                ->pluck('id')
                ->toArray();
            $more = true;
            $count = 1;

            do {
                $products = DB::table('products')
                    ->select('id')
                    ->orderBy('id', 'ASC')
                    ->simplePaginate(1000, 'id', 'page', $count);

                $product_category = [];
                $random_categories = $faker->randomElements($categories, 4, false);

                for ($i = 0; $i < count($random_categories); $i ++) {
                    for ($j = 0; $j < count($products->items()); $j++) {
                        array_push($product_category, [
                            'category_id' => $random_categories[$i],
                            'product_id' => $products->items()[$j]->id
                        ]);
                    }
                }

                DB::table('category_product')->insert($product_category);
                $more = $products->hasMorePages();
                dump($count);
                unset($product_category);
                unset($products);
                $count++;
            } while ($more);

        } catch (\Exception $e) {
            dump($e);
        }
    }
}

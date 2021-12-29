<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use App\Models\Tag;
use App\Models\User;
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
         User::factory(10)->create();
         Tag::factory(20)->create();
         Category::factory(20)->create();
         Status::factory(20)->create();
         for ($i = 0; $i <= 1000; $i++) {
             dump($i);
             Product::factory(1000)->make();
         }
    }
}

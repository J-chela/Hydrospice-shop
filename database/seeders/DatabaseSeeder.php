<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Loop through categories and give each one some products
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {

                $name = $category->name . " Product " . $i;

                Product::create([
                    'category_id' => $category->id,
                    'name'        => $name,
                    'slug'        => Str::slug($name) . '-' . Str::random(5),
                    'image'       => "https://via.placeholder.com/400?text=" . urlencode($name),
                    'description' => "This is a sample product for category {$category->name}.",

                    // Pricing
                    'price'             => rand(100, 1000),
                    'discount_price'    => rand(50, 900),

                    // Stock
                    'stock' => rand(10, 100),

                    // Flash sale
                    'is_flash_sale'       => rand(0, 1),
                    'flash_sale_price'    => rand(50, 200),
                    'flash_sale_ends_at'  => now()->addHours(rand(1, 48)),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $seedlingId = Category::where('slug', 'seedlings')->first()->id;
        $seedsId = Category::where('slug', 'seeds')->first()->id;
        $cropsId = Category::where('slug', 'crops')->first()->id;
        $herbsId = Category::where('slug', 'herbs')->first()->id;
        $spicesId = Category::where('slug', 'spices')->first()->id;

        $products = [

            // Example crop item with flash sale
            [
                'category_id' => $cropsId,
                'name' => 'Fresh Spinach Bundle',
                'slug' => Str::slug('Fresh Spinach Bundle'),
                'price' => 40,
                'quantity' => 200,
                'image' => 'https://via.placeholder.com/300?text=Spinach',
                'flash_sale' => true,
                'flash_sale_ends_at' => now()->addHours(2),
            ],

            // Herbs
            [
                'category_id' => $herbsId,
                'name' => 'Basil Plant',
                'slug' => Str::slug('Basil Plant'),
                'price' => 25,
                'quantity' => 100,
                'image' => 'https://via.placeholder.com/300?text=Basil+Plant',
            ],

            // Spices
            [
                'category_id' => $spicesId,
                'name' => 'Cilantro Seeds',
                'slug' => Str::slug('Cilantro Seeds'),
                'price' => 30,
                'quantity' => 180,
                'image' => 'https://via.placeholder.com/300?text=Cilantro+Seeds',
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}

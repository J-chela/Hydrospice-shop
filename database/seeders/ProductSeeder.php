<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

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
            // Seedlings
            [
                'category_id' => $seedlingId,
                'name' => 'Tomato Seedling',
                'price' => 15,
                'quantity' => 500,
                'image' => 'https://via.placeholder.com/300?text=Tomato+Seedling',
                'flash_sale' => true,
                'flash_sale_ends_at' => now()->addHours(5),
            ],
            [
                'category_id' => $seedlingId,
                'name' => 'Onion Seedling',
                'price' => 10,
                'quantity' => 300,
                'image' => 'https://via.placeholder.com/300?text=Onion+Seedling',
            ],

            // Seeds
            [
                'category_id' => $seedsId,
                'name' => 'Kale Seeds',
                'price' => 120,
                'quantity' => 150,
                'image' => 'https://via.placeholder.com/300?text=Kale+Seeds',
            ],

            // Crops
            [
                'category_id' => $cropsId,
                'name' => 'Fresh Spinach Bundle',
                'price' => 40,
                'quantity' => 200,
                'image' => 'https://via.placeholder.com/300?text=Spinach',
                'flash_sale' => true,
                'flash_sale_ends_at' => now()->addHours(3),
            ],

            // Herbs
            [
                'category_id' => $herbsId,
                'name' => 'Fresh Basil Leaves',
                'price' => 80,
                'quantity' => 100,
                'image' => 'https://via.placeholder.com/300?text=Basil+Leaves',
            ],

            // Spices
            [
                'category_id' => $spicesId,
                'name' => 'Turmeric Powder',
                'price' => 150,
                'quantity' => 50,
                'image' => 'https://via.placeholder.com/300?text=Turmeric',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

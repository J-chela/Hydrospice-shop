<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
public function definition(): array
{
    $name = $this->faker->words(3, true);

    return [
        'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? 1,
        'name' => $name,
        'slug' => \Str::slug($name) . '-' . uniqid(),
        'image' => 'https://via.placeholder.com/400x400?text=Product',
        'description' => $this->faker->sentence(12),
        'price' => $this->faker->randomFloat(2, 500, 5000),
        'discount_price' => null,
        'is_flash_sale' => false,
        'flash_sale_price' => null,
        'flash_sale_ends_at' => null,
    ];
}
}
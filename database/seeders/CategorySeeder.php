<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Seedlings', 'slug' => 'seedlings', 'icon' => '🌱'],
            ['name' => 'Seeds', 'slug' => 'seeds', 'icon' => '🌾'],
            ['name' => 'Crops', 'slug' => 'crops', 'icon' => '🥬'],
            ['name' => 'Herbs', 'slug' => 'herbs', 'icon' => '🌿'],
            ['name' => 'Spices', 'slug' => 'spices', 'icon' => '🧂'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}

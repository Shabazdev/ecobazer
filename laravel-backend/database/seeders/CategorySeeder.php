<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fresh Vegetables', 'slug' => 'fresh-vegetables', 'description' => 'Organic and farm fresh vegetables'],
            ['name' => 'Fresh Fruits', 'slug' => 'fresh-fruits', 'description' => 'Juicy organic seasonal fruits'],
            ['name' => 'River Fish', 'slug' => 'river-fish', 'description' => 'Fresh catch river and sea fish'],
            ['name' => 'Meat & Poultry', 'slug' => 'meat-poultry', 'description' => 'Organic grass-fed meat and poultry'],
            ['name' => 'Beverages', 'slug' => 'beverages', 'description' => 'Natural organic juices and drinks'],
            ['name' => 'Snacks', 'slug' => 'snacks', 'description' => 'Healthy organic snacks and dry fruits'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $vegetables = Category::where('slug', 'fresh-vegetables')->first();
        $fruits = Category::where('slug', 'fresh-fruits')->first();
        $snacks = Category::where('slug', 'snacks')->first();

        $products = [
            [
                'category_id' => $vegetables ? $vegetables->id : 1,
                'name' => 'Chinese Cabbage',
                'slug' => 'chinese-cabbage',
                'description' => 'Fresh organic Chinese cabbage harvested locally.',
                'price' => 14.00,
                'sale_price' => 12.00,
                'stock' => 50,
                'image' => 'src/images/products/img-01.png',
                'is_featured' => true,
            ],
            [
                'category_id' => $vegetables ? $vegetables->id : 1,
                'name' => 'Green Lettuce',
                'slug' => 'green-lettuce',
                'description' => 'Crisp green lettuce leaves, rich in vitamins.',
                'price' => 9.00,
                'sale_price' => 7.50,
                'stock' => 40,
                'image' => 'src/images/products/img-02.png',
                'is_featured' => true,
            ],
            [
                'category_id' => $fruits ? $fruits->id : 2,
                'name' => 'Fresh Mango',
                'slug' => 'fresh-mango',
                'description' => 'Sweet and juicy organic mangoes direct from farm.',
                'price' => 22.00,
                'sale_price' => 18.00,
                'stock' => 30,
                'image' => 'src/images/products/img-03.png',
                'is_featured' => true,
            ],
            [
                'category_id' => $snacks ? $snacks->id : 6,
                'name' => 'Organic Corn',
                'slug' => 'organic-corn',
                'description' => 'Sweet organic golden corn cobs.',
                'price' => 15.00,
                'sale_price' => 11.00,
                'stock' => 60,
                'image' => 'src/images/products/img-04.png',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $prod) {
            Product::firstOrCreate(['slug' => $prod['slug']], $prod);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()->create([
            'type' => Product::TYPE_VIDEOS,
            'name' => 'Laravel Package Training Video Course',
            'paddle_product_id' => '593300',
            'price' => 79,
        ]);
    }
}

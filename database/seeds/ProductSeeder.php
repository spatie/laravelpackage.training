<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class)->create([
            'type' => Product::TYPE_VIDEOS,
            'name' => 'Only the videos',
            'paddle_product_id' => '579713',
            'price' => 49,
        ]);
    }
}

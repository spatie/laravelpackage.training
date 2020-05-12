<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class)->create([
            'type' => Product::TYPE_STANDARD,
            'name' => 'Mailcoach',
            'paddle_product_id' => '578345',
            'price' => 99,
        ]);

        factory(Product::class)->create([
            'type' => Product::TYPE_STANDARD_RENEWAL,
            'name' => 'Mailcoach renewal',
            'paddle_product_id' => '579712',
            'price' => 99,

        ]);

        factory(Product::class)->create([
            'type' => Product::TYPE_VIDEOS,
            'name' => 'Only the videos',
            'paddle_product_id' => '579713',
            'price' => 49,
        ]);
    }
}

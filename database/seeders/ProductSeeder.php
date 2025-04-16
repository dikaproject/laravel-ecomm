<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Vintage Denim Jacket',
                'price' => 250000,
                'image' => 'images/products/denim-jacket.jpg',
            ],
            [
                'name' => 'Retro Graphic Tee',
                'price' => 85000,
                'image' => 'images/products/graphic-tee.jpg',
            ],
            [
                'name' => 'High Waist Mom Jeans',
                'price' => 175000,
                'image' => 'images/products/mom-jeans.jpg',
            ],
            [
                'name' => 'Oversized Flannel Shirt',
                'price' => 120000,
                'image' => 'images/products/flannel-shirt.jpg',
            ],
            [
                'name' => 'Y2K Mini Skirt',
                'price' => 95000,
                'image' => 'images/products/mini-skirt.jpg',
            ],
            [
                'name' => 'Vintage Band T-Shirt',
                'price' => 135000,
                'image' => 'images/products/band-tshirt.jpg',
            ],
            [
                'name' => 'Leather Crossbody Bag',
                'price' => 210000,
                'image' => 'images/products/leather-bag.jpg',
            ],
            [
                'name' => 'Chunky Platform Boots',
                'price' => 320000,
                'image' => 'images/products/platform-boots.jpg',
            ],
            [
                'name' => 'Corduroy Bucket Hat',
                'price' => 75000,
                'image' => 'images/products/bucket-hat.jpg',
            ],
            [
                'name' => 'Vintage Silk Scarf',
                'price' => 60000,
                'image' => 'images/products/silk-scarf.jpg',
            ],
            [
                'name' => '90s Windbreaker',
                'price' => 185000,
                'image' => 'images/products/windbreaker.jpg',
            ],
            [
                'name' => 'Retro Sunglasses',
                'price' => 90000,
                'image' => 'images/products/sunglasses.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
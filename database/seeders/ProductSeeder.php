<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name' => 'Dell i7', 'description' => 'DELL Intel Core i7 13650HX - (16 GB/512 GB SSD/Windows 11 Home/6 GB', 'price' => 60000, 'image' => 'products/delli7.jpg', 'stock' => 5]);
        Product::create(['name' => 'iphone 12', 'description' => 'Apple. iPhone 12 (White, 64 GB).', 'price' => 40000, 'image' => 'products/iphone12.jpg', 'stock' => 10]);
        Product::create(['name' => 'MI', 'description' => 'Mi XIAOMI SMART TV X SERIES 43 - Mi Televisions', 'price' => 20000, 'image' => 'products/fridge.jpg', 'stock' => 0]);
        Product::create(['name' => 'LG', 'description' => 'LG 8kg Top Load Washing Machine T80SPSF1Z', 'price' => 35000, 'image' => 'products/washingmachine.jpg', 'stock' => 12]);
        Product::create(['name' => 'Swift', 'description' => 'Pull Back Maruti Swift Toy Car for Kids| Wonderful Design', 'price' => 1500, 'image' => 'products/swift.jpg', 'stock' => 25]);
        Product::create(['name' => 'Philips', 'description' => 'Philips DST0820/20 Steam Iron Box', 'price' => 1000, 'image' => 'products/ironbox.webp', 'stock' => 30]);
        Product::create(['name' => 'Linen', 'description' => 'Moss Green Linen Cotton Shirt', 'price' => 2000, 'image' => 'products/shirt.webp', 'stock' => 8]);
        Product::create(['name' => 'Jeans', 'description' => 'Snitch Mens Washed Slouchy Fit Jeans', 'price' => 1000, 'image' => 'products/jeanss.jpg', 'stock' => 16]);
        Product::create(['name' => 'Sony', 'description' => 'Sony WH-CH710N Noise Cancelling Wireless Headphones', 'price' => 4000, 'image' => 'products/headphone.webp', 'stock' => 11]);
        Product::create(['name' => 'JBL', 'description' => 'JBL Go Essential Portable Speaker', 'price' => 1699, 'image' => 'products/jbl.webp', 'stock' => 19]);
    }   
}

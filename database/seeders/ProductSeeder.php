<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name_ar' => 'آيفون 15 برو ماكس',
                'name_en' => 'iPhone 15 Pro Max',
                'slug' => 'iphone-15-pro-max',
                'description_ar' => 'أحدث هاتف من أبل مع كاميرا احترافية 48MP وشريحة A17 Pro',
                'description_en' => 'Latest Apple phone with 48MP professional camera and A17 Pro chip',
                'price' => 4599,
                'compare_price' => 5399,
                'stock_quantity' => 50,
                'sku' => 'IP15PM-256',
                'category_id' => 1,
                'brand_id' => 1,
                'is_featured' => true,
                'is_active' => true,
                'image' => 'assets/0x0.webp',
            ],
            [
                'name_ar' => 'ماك بوك برو 16 بوصة M3',
                'name_en' => 'MacBook Pro 16" M3',
                'slug' => 'macbook-pro-16-m3',
                'description_ar' => 'لابتوب احترافي بشريحة M3، أداء خارق وعمر بطارية طويل',
                'description_en' => 'Professional laptop with M3 chip, amazing performance and long battery life',
                'price' => 8999,
                'compare_price' => null,
                'stock_quantity' => 30,
                'sku' => 'MBP16-M3',
                'category_id' => 2,
                'brand_id' => 1,
                'is_featured' => true,
                'is_active' => true,
                'image' => 'assets/images/mac.jpg',
            ],
            [
                'name_ar' => 'كانون EOS R5',
                'name_en' => 'Canon EOS R5',
                'slug' => 'canon-eos-r5',
                'description_ar' => 'كاميرا احترافية بدقة 45 ميجابكسل، تصوير 8K',
                'description_en' => 'Professional camera with 45MP, 8K video',
                'price' => 12999,
                'compare_price' => null,
                'stock_quantity' => 15,
                'sku' => 'CAN-R5',
                'category_id' => 3,
                'brand_id' => 6,
                'is_featured' => true,
                'is_active' => true,
                'image' => 'assets/images/Canon-EOS-R5-primary.jpg',
            ],
            [
                'name_ar' => 'سماعات سوني WH-1000XM4',
                'name_en' => 'Sony WH-1000XM4 Headphones',
                'slug' => 'sony-wh-1000xm4',
                'description_ar' => 'سماعات لاسلكية مع عزل ضوضاء ممتاز',
                'description_en' => 'Wireless headphones with excellent noise cancellation',
                'price' => 899,
                'compare_price' => 1199,
                'stock_quantity' => 100,
                'sku' => 'SON-WH1000XM4',
                'category_id' => 4,
                'brand_id' => 3,
                'is_featured' => true,
                'is_active' => true,
                'image' => 'assets/images/Sony WH-1000XM4 Headphones.avif',
            ],
        ];

        foreach ($products as $product) {
            $imagePath = $product['image'];
            unset($product['image']);

            $newProduct = Product::create($product);

            // إضافة صورة رئيسية لكل منتج
            ProductImage::create([
                'product_id' => $newProduct->id,
                'image_path' => $imagePath,
                'is_primary' => true,
            ]);
        }
    }
}

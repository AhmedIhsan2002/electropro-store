<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name_ar' => 'أبل', 'name_en' => 'Apple', 'slug' => 'apple', 'logo' => 'https://via.placeholder.com/150x50?text=Apple', 'is_active' => true],
            ['name_ar' => 'سامسونج', 'name_en' => 'Samsung', 'slug' => 'samsung', 'logo' => 'https://via.placeholder.com/150x50?text=Samsung', 'is_active' => true],
            ['name_ar' => 'سوني', 'name_en' => 'Sony', 'slug' => 'sony', 'logo' => 'https://via.placeholder.com/150x50?text=Sony', 'is_active' => true],
            ['name_ar' => 'ديل', 'name_en' => 'Dell', 'slug' => 'dell', 'logo' => 'https://via.placeholder.com/150x50?text=Dell', 'is_active' => true],
            ['name_ar' => 'إتش بي', 'name_en' => 'HP', 'slug' => 'hp', 'logo' => 'https://via.placeholder.com/150x50?text=HP', 'is_active' => true],
            ['name_ar' => 'كانون', 'name_en' => 'Canon', 'slug' => 'canon', 'logo' => 'https://via.placeholder.com/150x50?text=Canon', 'is_active' => true],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}

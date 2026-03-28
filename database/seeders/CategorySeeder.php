<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name_ar' => 'جوالات',
                'name_en' => 'Phones',
                'slug' => 'phones',
                'description' => 'أحدث الهواتف الذكية',
                'image' => 'assets/0x0.webp',
                'is_active' => true,
            ],
            [
                'name_ar' => 'لابتوبات',
                'name_en' => 'Laptops',
                'slug' => 'laptops',
                'description' => 'أجهزة محمولة قوية',
                'image' => 'assets/images/laptop.webp',
                'is_active' => true,
            ],
            [
                'name_ar' => 'كاميرات',
                'name_en' => 'Cameras',
                'slug' => 'cameras',
                'description' => 'صور وفيديوهات احترافية',
                'image' => 'assets/images/Cameras.jpg',
                'is_active' => true,
            ],
            [
                'name_ar' => 'إكسسوارات',
                'name_en' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'سماعات، شواحن، كفرات',
                'image' => 'assets/images/Accessories.webp',
                'is_active' => true,
            ],
            [
                'name_ar' => 'ساعات ذكية',
                'name_en' => 'Smart Watches',
                'slug' => 'smart-watches',
                'description' => 'ساعات متطورة',
                'image' => 'assets/images/Apple-Watch.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

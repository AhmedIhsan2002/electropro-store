<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'description_ar',
        'description_en',
        'specifications',
        'price',
        'compare_price',
        'stock_quantity',
        'sku',
        'category_id',
        'brand_id',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'specifications' => 'array',
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
    ];

    // العلاقة مع القسم
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // العلاقة مع الماركة
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // العلاقة مع الصور
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // العلاقة مع التقييمات
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // دالة للحصول على الصورة الرئيسية
    // دالة للحصول على الصورة الرئيسية
  public function getPrimaryImageAttribute()
  {
      $primary = $this->images()->where('is_primary', true)->first();
      if ($primary) {
          return asset($primary->image_path);  // asset() يضيف المسار الكامل
      }

      $first = $this->images()->first();
      if ($first) {
          return asset($first->image_path);
      }

      // صورة افتراضية إذا لم توجد صور
      return asset('assets/images/default-product.jpg');
  }

    // دالة للحصول على الاسم حسب اللغة
    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }

    // دالة للحصول على الوصف حسب اللغة
    public function getDescriptionAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->description_ar : $this->description_en;
    }

    // دالة لحساب نسبة الخصم
    public function getDiscountPercentAttribute()
    {
        if ($this->compare_price && $this->compare_price > $this->price) {
            return round(($this->compare_price - $this->price) / $this->compare_price * 100);
        }
        return 0;
    }
}

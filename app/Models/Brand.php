<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'logo',
        'is_active',
    ];

    // العلاقة مع المنتجات
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // دالة للحصول على الاسم حسب اللغة
    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }
}

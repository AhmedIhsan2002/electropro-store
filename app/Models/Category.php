<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'description',
        'image',
        'parent_id',
        'is_active',
    ];

    // العلاقة مع المنتجات
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // العلاقة مع الأقسام الفرعية
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // العلاقة مع القسم الرئيسي
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // دالة للحصول على الاسم حسب اللغة
    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }
}

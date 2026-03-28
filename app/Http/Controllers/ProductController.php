<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // عرض الصفحة الرئيسية
    public function home()
    {
        $featuredProducts = Product::where('is_featured', true)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        $categories = Category::where('is_active', true)
            ->limit(5)
            ->get();

        return view('home', compact('featuredProducts', 'categories'));
    }

    // عرض صفحة المنتجات مع الفلاتر
    public function index(Request $request)
    {
        $query = Product::where('is_active', true);

        // فلتر حسب القسم
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // فلتر حسب الماركة
        if ($request->has('brand') && $request->brand) {
            $query->where('brand_id', $request->brand);
        }

        // فلتر حسب السعر
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // ترتيب المنتجات
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'latest':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12);

        $categories = Category::where('is_active', true)->get();
        $brands = Brand::where('is_active', true)->get();

        return view('products', compact('products', 'categories', 'brands'));
    }

    // عرض صفحة تفاصيل المنتج
    public function show($id)
    {
        $product = Product::with(['category', 'brand', 'images', 'reviews'])
            ->findOrFail($id);

        // منتجات مشابهة من نفس القسم
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('product-details', compact('product', 'relatedProducts'));
    }
}

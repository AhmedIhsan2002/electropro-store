<!DOCTYPE html>

<html lang="ar" dir="rtl">

@php
    // تعيين اللغة العربية
    app()->setLocale('ar');
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات - ElectroPro</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
</head>
<body>
        <!-- شريط علوي للإشعارات -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-right">
                    <span><i class="fas fa-truck"></i> توصيل مجاني للطلبات فوق 500 $</span>
                    <span><i class="fas fa-shield-alt"></i> ضمان لمدة عام على جميع المنتجات</span>
                </div>
                <div class="top-bar-left">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <span class="divider">|</span>
                    <a href="#"><i class="fas fa-user"></i> حسابي</a>
                    <a href="#"><i class="fas fa-shopping-cart"></i> السلة (0)</a>
                </div>
            </div>
        </div>
    </div>
    <!-- شريط التنقل الرئيسي -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1>Electro<span>Pro</span></h1>
                </div>

                <div class="search-bar">
                    <form action="#" method="GET">
                        <input type="text" placeholder="ابحث عن 20000+ منتج..." class="search-input">
                        <select class="category-select">
                            <option value="">الكل</option>
                            <option value="phones">جوالات</option>
                            <option value="laptops">لابتوبات</option>
                            <option value="cameras">كاميرات</option>
                            <option value="accessories">إكسسوارات</option>
                        </select>
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="header-actions">
                    <div class="support">
                        <i class="fas fa-headset"></i>
                        <div class="support-text">
                            <span>دعم فني 24/7</span>
                            <strong>9200 123 45</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- القائمة السفلية -->
            <nav class="main-nav">
                <ul>
                    <li><a href="{{ route('home') }}" class="active"><i class="fas fa-home"></i> الرئيسية</a></li>
                    <li class="dropdown">
                        <a href="{{ route('products') }}"><i class="fas fa-mobile-alt"></i> جوالات <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu">
                            <div class="dropdown-grid">
                                <div class="dropdown-col">
                                    <h4>أبل</h4>
                                    <a href="#">آيفون 15 برو</a>
                                    <a href="#">آيفون 15</a>
                                    <a href="#">آيفون 14</a>
                                    <a href="#">آيفون 13</a>
                                </div>
                                <div class="dropdown-col">
                                    <h4>سامسونج</h4>
                                    <a href="#">Galaxy S24</a>
                                    <a href="#">Galaxy S23</a>
                                    <a href="#">Galaxy Z Fold</a>
                                    <a href="#">Galaxy Z Flip</a>
                                </div>
                                <div class="dropdown-col">
                                    <h4>شاومي</h4>
                                    <a href="#">Xiaomi 14</a>
                                    <a href="#">Xiaomi 13T</a>
                                    <a href="#">Redmi Note 13</a>
                                    <a href="#">Poco X6</a>
                                </div>
                                <div class="dropdown-col">
                                    <img src="https://via.placeholder.com/300x200" alt="عرض خاص">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('products') }}"><i class="fas fa-laptop"></i> لابتوبات <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu">
                            <div class="dropdown-grid">
                                <div class="dropdown-col">
                                    <h4>أبل</h4>
                                    <a href="#">MacBook Pro 16"</a>
                                    <a href="#">MacBook Pro 14"</a>
                                    <a href="#">MacBook Air M2</a>
                                    <a href="#">MacBook Air M1</a>
                                </div>
                                <div class="dropdown-col">
                                    <h4>ديل</h4>
                                    <a href="#">XPS 15</a>
                                    <a href="#">XPS 13</a>
                                    <a href="#">Inspiron</a>
                                    <a href="#">Alienware</a>
                                </div>
                                <div class="dropdown-col">
                                    <h4>إتش بي</h4>
                                    <a href="#">Spectre x360</a>
                                    <a href="#">Envy</a>
                                    <a href="#">Pavilion</a>
                                    <a href="#">Omen</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ route('products') }}"><i class="fas fa-camera"></i> كاميرات</a></li>
                    <li><a href="{{ route('products') }}"><i class="fas fa-headphones"></i> إكسسوارات</a></li>
                    <li><a href="{{ route('products') }}"><i class="fas fa-tags"></i> عروض خاصة</a></li>
                    <li><a href="#"><i class="fas fa-bolt"></i> الأكثر مبيعاً</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- مسار التنقل (Breadcrumb) -->
<div class="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{ route('home') }}">الرئيسية</a></li>
            <li><i class="fas fa-chevron-left"></i></li>
            <li class="active">المنتجات</li>
        </ul>
    </div>
</div>

<!-- عنوان الصفحة -->
<section class="page-header">
    <div class="container">
        <h1>جميع المنتجات</h1>
        <p>تصفح أحدث الأجهزة الإلكترونية بأفضل الأسعار</p>
    </div>
</section>

<!-- قسم المنتجات مع الفلاتر -->
<section class="products-section">
    <div class="container">
        <div class="products-layout">
            <!-- الشريط الجانبي للفلاتر -->
            <aside class="products-sidebar">
        <!-- فلتر الفئات -->
        <div class="filter-box">
            <h3 class="filter-title">الفئات</h3>
            <div class="filter-content">
                <ul class="category-list">
                    @foreach($categories as $category)
                        <li>
                            <label class="checkbox-label">
                                <input type="checkbox"
                                       name="category[]"
                                       value="{{ $category->id }}"
                                       {{ request()->has('category') && request()->category == $category->id ? 'checked' : '' }}>
                                <span>{{ $category->name }}</span>
                                <span class="count">({{ $category->products->count() }})</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- فلتر الماركات -->
        <div class="filter-box">
            <h3 class="filter-title">الماركات</h3>
            <div class="filter-content">
                <ul class="brand-list">
                    @foreach($brands as $brand)
                        <li>
                            <label class="checkbox-label">
                                <input type="checkbox"
                                       name="brand[]"
                                       value="{{ $brand->id }}">
                                <span>{{ $brand->name }}</span>
                                <span class="count">({{ $brand->products->count() }})</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </aside>

            <!-- قسم عرض المنتجات -->
            <main class="products-main">
                <!-- شريط الأدوات (ترتيب وعرض) -->
                <div class="products-toolbar">
                    <div class="products-count">
                        عرض <span>1-12</span> من <span>156</span> منتج
                    </div>
                    <div class="products-sort">
                        <label>ترتيب حسب:</label>
                        <select>
                            <option>الأحدث</option>
                            <option>الأقل سعراً</option>
                            <option>الأعلى سعراً</option>
                            <option>الأكثر مبيعاً</option>
                            <option>الأعلى تقييماً</option>
                        </select>
                    </div>
                    <div class="products-view">
                        <button class="view-btn active"><i class="fas fa-th-large"></i></button>
                        <button class="view-btn"><i class="fas fa-list"></i></button>
                    </div>
                </div>

                <!-- شبكة المنتجات -->
                <div class="products-grid">
      @forelse($products as $product)
          <div class="product-card">
              @if($product->discount_percent > 0)
                  <div class="product-badge">-{{ $product->discount_percent }}%</div>
              @endif
              <div class="product-img">
                  <img src="{{ $product->primary_image }}" alt="{{ $product->name }}">
              </div>
              <div class="product-info">
                  <a href="{{ route('product.details', $product->id) }}" style="text-decoration: none; color: inherit;">
                      <h3>{{ $product->name }}</h3>
                  </a>
                  <div class="product-meta">
                      @if($product->brand)
                          <span class="brand">{{ $product->brand->name }}</span>
                      @endif
                      <div class="rating">
                          @php
                              $avgRating = $product->reviews->avg('rating') ?? 0;
                              $fullStars = floor($avgRating);
                              $halfStar = $avgRating - $fullStars >= 0.5;
                          @endphp
                          @for($i = 1; $i <= 5; $i++)
                              @if($i <= $fullStars)
                                  <i class="fas fa-star"></i>
                              @elseif($i == $fullStars + 1 && $halfStar)
                                  <i class="fas fa-star-half-alt"></i>
                              @else
                                  <i class="far fa-star"></i>
                              @endif
                          @endfor
                          <span>({{ $product->reviews->count() }})</span>
                      </div>
                  </div>
                  <div class="price">
                     <span class="current">{{ number_format($product->price / 3.75, 2) }} $</span>
                      @if($product->compare_price)
                        <span class="current">{{ number_format($product->price / 3.75, 2) }} $</span>
                      @endif
                  </div>
                  <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                        أضف للسلة
                    </button>
              </form>
              </div>
          </div>
      @empty
          <div class="no-products">
              <p>لا توجد منتجات مطابقة للبحث</p>
          </div>
      @endforelse
  </div>

  <!-- ترقيم الصفحات -->
<div class="pagination">
    {{ $products->links() }}
</div>
                    <!-- منتج 1 -->
                    <div class="product-card">
                        <div class="product-badge">-15%</div>
                        <div class="product-img">
                            <img src="{{ asset('assets\0x0.webp') }}" alt="آيفون 15">
                            <div class="product-actions">
                                <button class="action-btn"><i class="far fa-heart"></i></button>
                                <button class="action-btn"><i class="fas fa-eye"></i></button>
                                <button class="action-btn"><i class="fas fa-balance-scale"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>آيفون 15 برو ماكس 256GB</h3>
                            <div class="product-meta">
                                <span class="brand">أبل</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(128)</span>
                                </div>
                            </div>
                            <div class="price">
                                <span class="current">4,599 $</span>
                                <span class="old">5,399 $</span>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                أضف للسلة
                            </button>
                        </div>
                    </div>

                    <!-- منتج 2 -->
                    <div class="product-card">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=300" alt="ماك بوك">
                            <div class="product-actions">
                                <button class="action-btn"><i class="far fa-heart"></i></button>
                                <button class="action-btn"><i class="fas fa-eye"></i></button>
                                <button class="action-btn"><i class="fas fa-balance-scale"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>ماك بوك برو 16 بوصة M3</h3>
                            <div class="product-meta">
                                <span class="brand">أبل</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(256)</span>
                                </div>
                            </div>
                            <div class="price">
                                <span class="current">8,999 $</span>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                أضف للسلة
                            </button>
                        </div>
                    </div>

                    <!-- منتج 3 -->
                    <div class="product-card">
                        <div class="product-badge">جديد</div>
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=300" alt="كاميرا">
                            <div class="product-actions">
                                <button class="action-btn"><i class="far fa-heart"></i></button>
                                <button class="action-btn"><i class="fas fa-eye"></i></button>
                                <button class="action-btn"><i class="fas fa-balance-scale"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>كانون EOS R5 مع عدسة 24-105mm</h3>
                            <div class="product-meta">
                                <span class="brand">كانون</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(89)</span>
                                </div>
                            </div>
                            <div class="price">
                                <span class="current">12,999 $</span>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                أضف للسلة
                            </button>
                        </div>
                    </div>

                    <!-- منتج 4 -->
                    <div class="product-card">
                        <div class="product-badge">-25%</div>
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300" alt="سماعات">
                            <div class="product-actions">
                                <button class="action-btn"><i class="far fa-heart"></i></button>
                                <button class="action-btn"><i class="fas fa-eye"></i></button>
                                <button class="action-btn"><i class="fas fa-balance-scale"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>سماعات سوني WH-1000XM4</h3>
                            <div class="product-meta">
                                <span class="brand">سوني</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(1.2k)</span>
                                </div>
                            </div>
                            <div class="price">
                                <span class="current">899 $</span>
                                <span class="old">1,199 $</span>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                أضف للسلة
                            </button>
                        </div>
                    </div>

                    <!-- منتج 5 -->
                    <div class="product-card">
                        <div class="product-img">
                            <img src="{{ asset('assets/images/Apple-Watch.jpg')}}" alt="ساعة">
                            <div class="product-actions">
                                <button class="action-btn"><i class="far fa-heart"></i></button>
                                <button class="action-btn"><i class="fas fa-eye"></i></button>
                                <button class="action-btn"><i class="fas fa-balance-scale"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>ساعة أبل واتش أولترا 2</h3>
                            <div class="product-meta">
                                <span class="brand">أبل</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(234)</span>
                                </div>
                            </div>
                            <div class="price">
                                <span class="current">2,899 $</span>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                أضف للسلة
                            </button>
                        </div>
                    </div>

                    <!-- منتج 6 -->
                    <div class="product-card">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?w=300" alt="لابتوب">
                            <div class="product-actions">
                                <button class="action-btn"><i class="far fa-heart"></i></button>
                                <button class="action-btn"><i class="fas fa-eye"></i></button>
                                <button class="action-btn"><i class="fas fa-balance-scale"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>لينوفو ثينك باد X1 كاربون</h3>
                            <div class="product-meta">
                                <span class="brand">لينوفو</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(67)</span>
                                </div>
                            </div>
                            <div class="price">
                                <span class="current">5,499 $</span>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                أضف للسلة
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ترقيم الصفحات (Pagination) -->
                <div class="pagination">
                    <a href="#" class="page-link disabled"><i class="fas fa-chevron-right"></i></a>
                    <a href="#" class="page-link active">1</a>
                    <a href="#" class="page-link">2</a>
                    <a href="#" class="page-link">3</a>
                    <a href="#" class="page-link">4</a>
                    <a href="#" class="page-link">5</a>
                    <span>...</span>
                    <a href="#" class="page-link">12</a>
                    <a href="#" class="page-link"><i class="fas fa-chevron-left"></i></a>
                </div>
            </main>
        </div>
    </div>
</section>

<!-- Footer (انسخه من صفحة home.blade.php) -->
</body>
</html>

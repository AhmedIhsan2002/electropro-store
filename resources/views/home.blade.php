<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroPro - المتجر الرقمي الأول للأجهزة الإلكترونية</title>

    <!-- Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - خطوط عصرية -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        /* إضافات CSS للعناصر الجديدة */
        .rating {
            color: #fbbf24;
            margin: 5px 0;
        }

        .rating i {
            margin-left: 2px;
        }

        .rating span {
            color: #64748b;
            margin-right: 5px;
        }

        .no-products {
            text-align: center;
            padding: 60px;
            background: white;
            border-radius: 15px;
            color: #64748b;
        }

        .product-actions {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.3s;
            z-index: 10;
        }

        .product-card:hover .product-actions {
            opacity: 1;
            transform: translateX(0);
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border: none;
            background: white;
            border-radius: 50%;
            color: #475569;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .action-btn:hover {
            background: #2563eb;
            color: white;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <!-- شريط علوي للإشعارات -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-right">
                    <span><i class="fas fa-truck"></i> توصيل مجاني للطلبات فوق 500 ريال</span>
                    <span><i class="fas fa-shield-alt"></i> ضمان لمدة عام على جميع المنتجات</span>
                </div>
                <div class="top-bar-left">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <span class="divider">|</span>
                    <a href="{{ route('wishlist') }}"><i class="fas fa-heart"></i> المفضلة</a>
                    @auth
                        <a href="{{ route('dashboard') }}"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: white; cursor: pointer;">
                                <i class="fas fa-sign-out-alt"></i> تسجيل خروج
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"><i class="fas fa-user"></i> تسجيل الدخول</a>
                        <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> إنشاء حساب</a>
                    @endauth
                    <a href="{{ route('cart') }}">
                  <i class="fas fa-shopping-cart"></i>
                  السلة
                  @if(session()->has('cart_count'))
                      ({{ session('cart_count') }})
                  @else
                      (0)
                  @endif
                  </a>
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
                        <a href="/products"><i class="fas fa-mobile-alt"></i> جوالات <i class="fas fa-chevron-down"></i></a>
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
                        <a href="/products"><i class="fas fa-laptop"></i> لابتوبات <i class="fas fa-chevron-down"></i></a>
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
                    <li><a href="/products"><i class="fas fa-camera"></i> كاميرات</a></li>
                    <li><a href="/products"><i class="fas fa-headphones"></i> إكسسوارات</a></li>
                    <li><a href="/products?offer=special"><i class="fas fa-tags"></i> عروض خاصة</a></li>
                    <li><a href="#"><i class="fas fa-bolt"></i> الأكثر مبيعاً</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle"></i> من نحن
                    </a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> اتصل بنا
                    </a></li>
                    <li><a href="{{ route('wishlist') }}"><i class="fas fa-heart"></i> المفضلة</a></li>
                </ul>
            </nav>

            <!-- Hero Section فخم مع حركة -->
            <section class="hero">
                <div class="container">
                    <div class="hero-wrapper">
                        <div class="hero-content">
                            <span class="hero-badge">🔥 عروض التخفيضات الكبرى</span>
                            <h1>آيفون 15 برو<br>بأقل سعر في السعودية</h1>
                            <p>احصل على أقوى العروض على أحدث الأجهزة الإلكترونية. تخفيضات تصل إلى 40% لفترة محدودة + ضمان عام شامل.</p>

                            <div class="hero-features">
                                <div class="feature">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>ضمان عام</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-truck"></i>
                                    <span>توصيل مجاني</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-undo-alt"></i>
                                    <span>إرجاع مجاني</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-headset"></i>
                                    <span>دعم 24/7</span>
                                </div>
                            </div>

                            <div class="hero-actions">
                                <a href="/products" class="btn btn-primary">
                                    تسوق الآن <i class="fas fa-arrow-left"></i>
                                </a>
                                <a href="#" class="btn btn-secondary">
                                    شاهد العروض <i class="fas fa-tags"></i>
                                </a>
                            </div>

                            <div class="hero-stats">
                                <div class="stat">
                                    <span class="stat-number">50K+</span>
                                    <span class="stat-label">عميل سعيد</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">20K+</span>
                                    <span class="stat-label">منتج</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">98%</span>
                                    <span class="stat-label">تقييم إيجابي</span>
                                </div>
                            </div>
                        </div>

                        <div class="hero-image">
                            <img src="{{ asset('assets/0x0.webp') }}" alt="iPhone 15 Pro Max">
                            <div class="floating-card card-1">
                                <i class="fas fa-star" style="color: #fbbf24;"></i>
                                <span>أعلى تقييم 2026</span>
                            </div>
                            <div class="floating-card card-2">
                                <i class="fas fa-bolt" style="color: #2563eb;"></i>
                                <span>شحن سريع 45W</span>
                            </div>
                            <div class="floating-card card-3">
                                <i class="fas fa-camera" style="color: #7c3aed;"></i>
                                <span>كاميرا 48MP</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ماركات عالمية -->
            <section class="brands">
                <div class="container">
                    <div class="brands-slider">
                        <div class="brand-item"><img src="{{ asset('assets/images/apple.webp') }}" alt="Apple"></div>
                        <div class="brand-item"><img src="{{ asset('assets/images/samsung.avif') }}" alt="Samsung"></div>
                        <div class="brand-item"><img src="{{ asset('assets/images/sony.png') }}" alt="Sony"></div>
                        <div class="brand-item"><img src="{{ asset('assets/images/Dell_Logo.svg.png') }}" alt="Dell"></div>
                        <div class="brand-item"><img src="{{ asset('assets/images/hp.png') }}" alt="HP"></div>
                        <div class="brand-item"><img src="{{ asset('assets/images/Canon_Logo.png') }}" alt="Canon"></div>
                    </div>
                </div>
            </section>

            <!-- فئات المنتجات -->
            <section class="categories">
                <div class="container">
                    <div class="section-header">
                        <div>
                            <span class="section-subtitle">تسوق حسب</span>
                            <h2 class="section-title">الفئات الأكثر طلباً</h2>
                        </div>
                        <a href="#" class="view-all">عرض الكل <i class="fas fa-arrow-left"></i></a>
                    </div>

                    <div class="categories-grid">
                        @foreach($categories as $category)
                            <div class="category-card @if($loop->first) large @endif">
                                @if($category->image)
                                    <img src="{{ $category->image }}" alt="{{ $category->name }}">
                                @else
                                    <img src="https://via.placeholder.com/400x400?text={{ $category->name }}" alt="{{ $category->name }}">
                                @endif
                                <div class="category-overlay">
                                    <h3>{{ $category->name }}</h3>
                                    @if($loop->first)
                                        <p>{{ $category->description }}</p>
                                    @endif
                                    <a href="{{ route('products', ['category' => $category->id]) }}">تسوق الآن</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- منتجات مميزة -->
            <section class="featured-products">
                <div class="container">
                    <div class="section-header">
                        <div>
                            <span class="section-subtitle">اختر الأفضل</span>
                            <h2 class="section-title">منتجات قد تعجبك</h2>
                        </div>
                        <div class="products-nav">
                            <button class="nav-btn prev"><i class="fas fa-chevron-right"></i></button>
                            <button class="nav-btn next"><i class="fas fa-chevron-left"></i></button>
                        </div>
                    </div>

                    <div class="products-grid">
                        @forelse($featuredProducts as $product)
                            <div class="product-card">
                                @if($product->discount_percent > 0)
                                    <div class="product-badge">-{{ $product->discount_percent }}%</div>
                                @endif
                                <div class="product-img">
                                    <img src="{{ asset($product->primary_image) }}" alt="{{ $product->name }}">
                                    <div class="product-actions">
                                        <button class="action-btn add-to-wishlist" data-id="{{ $product->id }}">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn quick-view" data-id="{{ $product->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
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
                                    <form action="{{ route('cart.add') }}" method="POST" style="display: inline;" onsubmit="return confirmAddToCart()">
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
                                <p>لا توجد منتجات حالياً</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </header>

    <!-- Footer فخم متعدد الأقسام -->
    <footer class="footer">
        <!-- قسم النشرة البريدية -->
        <div class="footer-newsletter">
            <div class="container">
                <div class="newsletter-wrapper">
                    <div class="newsletter-content">
                        <h3>اشترك في النشرة البريدية</h3>
                        <p>احصل على أحدث العروض والتخفيضات أول بأول</p>
                    </div>
                    <form class="newsletter-form">
                        <input type="email" placeholder="أدخل بريدك الإلكتروني" required>
                        <button type="submit">اشتراك <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <!-- الروابط الرئيسية -->
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid">
                    <!-- العمود الأول: معلومات المتجر -->
                    <div class="footer-col">
                        <div class="footer-logo">
                            <h2>Electro<span>Pro</span></h2>
                        </div>
                        <p class="footer-about">
                            المتجر الرقمي الأول في السعودية للأجهزة الإلكترونية. نوفر أحدث المنتجات بأفضل الأسعار مع ضمان عام شامل ودعم فني 24/7.
                        </p>
                        <div class="footer-social">
                            <h4>تابعنا على</h4>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-tiktok"></i></a>
                                <a href="#"><i class="fab fa-snapchat"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- العمود الثاني: روابط سريعة -->
                    <div class="footer-col">
                        <h4>روابط سريعة</h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}"><i class="fas fa-angle-left"></i> الرئيسية</a></li>
                            <li><a href="{{ route('about') }}"><i class="fas fa-angle-left"></i> من نحن</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fas fa-angle-left"></i> اتصل بنا</a></li>
                            <li><a href="{{ route('products') }}"><i class="fas fa-angle-left"></i> المنتجات</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> العروض الخاصة</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> المدونة</a></li>
                        </ul>
                    </div>

                    <!-- العمود الثالث: حساباتي -->
                    <div class="footer-col">
                        <h4>حسابي</h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('login') }}"><i class="fas fa-angle-left"></i> تسجيل الدخول</a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-angle-left"></i> إنشاء حساب</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> طلباتي</a></li>
                            <li><a href="{{ route('cart') }}"><i class="fas fa-angle-left"></i> السلة</a></li>
                            <li><a href="{{ route('wishlist') }}"><i class="fas fa-angle-left"></i> المفضلة</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> تتبع الطلب</a></li>
                        </ul>
                    </div>

                    <!-- العمود الرابع: خدمة العملاء -->
                    <div class="footer-col">
                        <h4>خدمة العملاء</h4>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fas fa-angle-left"></i> سياسة الخصوصية</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> شروط الاستخدام</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> سياسة الإرجاع</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> طرق الدفع</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> الشحن والتوصيل</a></li>
                            <li><a href="#"><i class="fas fa-angle-left"></i> الأسئلة الشائعة</a></li>
                        </ul>
                    </div>

                    <!-- العمود الخامس: معلومات الاتصال -->
                    <div class="footer-col">
                        <h4>تواصل معنا</h4>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <strong>العنوان:</strong>
                                    <p>المملكة العربية السعودية، الرياض، حط النور، شارع التخصصي</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <div>
                                    <strong>الهاتف:</strong>
                                    <p>+966 55 555 5555</p>
                                    <p>+966 11 234 5678</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <strong>البريد الإلكتروني:</strong>
                                    <p>info@electropro.com</p>
                                    <p>support@electropro.com</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <div>
                                    <strong>ساعات العمل:</strong>
                                    <p>السبت - الخميس: 9ص - 10م</p>
                                    <p>الجمعة: 4م - 10م</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- شارات الجودة والضمان -->
                <div class="footer-badges">
                    <div class="badge-item">
                        <i class="fas fa-truck"></i>
                        <div>
                            <strong>توصيل سريع</strong>
                            <span>خلال 24 ساعة</span>
                        </div>
                    </div>
                    <div class="badge-item">
                        <i class="fas fa-shield-alt"></i>
                        <div>
                            <strong>ضمان عام</strong>
                            <span>حتى 3 سنوات</span>
                        </div>
                    </div>
                    <div class="badge-item">
                        <i class="fas fa-credit-card"></i>
                        <div>
                            <strong>دفع آمن</strong>
                            <span>طرق دفع متعددة</span>
                        </div>
                    </div>
                    <div class="badge-item">
                        <i class="fas fa-undo-alt"></i>
                        <div>
                            <strong>إرجاع مجاني</strong>
                            <span>خلال 14 يوم</span>
                        </div>
                    </div>
                    <div class="badge-item">
                        <i class="fas fa-headset"></i>
                        <div>
                            <strong>دعم فني</strong>
                            <span>24/7 على مدار الساعة</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- طرق الدفع -->
        <div class="footer-payment">
            <div class="container">
                <div class="payment-wrapper">
                    <div class="payment-methods">
                        <span>طرق الدفع المتاحة:</span>
                        <img src="https://via.placeholder.com/50x30?text=Visa" alt="Visa">
                        <img src="https://via.placeholder.com/50x30?text=Mastercard" alt="Mastercard">
                        <img src="https://via.placeholder.com/50x30?text=AMEX" alt="AMEX">
                        <img src="https://via.placeholder.com/50x30?text=Mada" alt="Mada">
                        <img src="https://via.placeholder.com/50x30?text=PayPal" alt="PayPal">
                        <img src="https://via.placeholder.com/50x30?text=ApplePay" alt="Apple Pay">
                    </div>
                    <div class="download-apps">
                        <span>حمّل التطبيق:</span>
                        <a href="#" class="app-btn">
                            <i class="fab fa-apple"></i>
                            App Store
                        </a>
                        <a href="#" class="app-btn">
                            <i class="fab fa-google-play"></i>
                            Google Play
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- الحقوق المحفوظة -->
        <div class="footer-bottom">
            <div class="container">
                <div class="bottom-wrapper">
                    <p>جميع الحقوق محفوظة &copy; 2024 <strong>ElectroPro</strong> - متجر الأجهزة الإلكترونية الأول في السعودية</p>
                    <div class="footer-lang">
                        <a href="#" class="active">العربية</a>
                        <span>|</span>
                        <a href="#">English</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // دالة مؤقتة لإضافة المنتج للسلة (سيتم تطويرها لاحقاً)
        function addToCart(productId) {
            alert('تم إضافة المنتج إلى السلة (سيتم تفعيل هذه الخاصية قريباً)');
        }

        // دالة مؤقتة لإضافة المنتج للمفضلة
        function addToWishlist(productId) {
            alert('تم إضافة المنتج إلى المفضلة (سيتم تفعيل هذه الخاصية قريباً)');
        }

        function confirmAddToCart() {
       alert('تم إضافة المنتج إلى السلة بنجاح');
       return true;
   }
    </script>
</body>
</html>

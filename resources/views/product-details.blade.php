<!DOCTYPE html>
<html lang="ar" dir="rtl">

@php
    app()->setLocale('ar');
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - ElectroPro</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/product-details.css') }}">

    <style>
        /* إضافات CSS إضافية */
        .no-products {
            text-align: center;
            padding: 60px;
            background: white;
            border-radius: 15px;
            color: #64748b;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        @media (max-width: 1200px) {
            .products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 992px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
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
                    <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i> السلة (0)</a>
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
                    <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> الرئيسية</a></li>
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
                    <li><a href="{{ route('products') }}"><i class="fas fa-bolt"></i> الأكثر مبيعاً</a></li>
                    <li><a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> من نحن</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> اتصل بنا</a></li>
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
                <li><a href="{{ route('products') }}">المنتجات</a></li>
                <li><i class="fas fa-chevron-left"></i></li>
                @if($product->category)
                    <li><a href="{{ route('products', ['category' => $product->category_id]) }}">{{ $product->category->name }}</a></li>
                    <li><i class="fas fa-chevron-left"></i></li>
                @endif
                <li class="active">{{ $product->name }}</li>
            </ul>
        </div>
    </div>

    <!-- قسم تفاصيل المنتج -->
    <section class="product-details">
        <div class="container">
            <div class="details-wrapper">
                <!-- الجزء الأيمن: معرض الصور -->
                <div class="product-gallery">
                    <div class="main-image">
                        <img src="{{ $product->primary_image }}" alt="{{ $product->name }}" id="mainProductImage">
                    </div>
                    <div class="thumbnail-images">
                        @foreach($product->images as $image)
                            <img src="{{ $image->image_path }}" alt="{{ $product->name }}" class="thumbnail {{ $loop->first ? 'active' : '' }}" onclick="changeImage(this.src)">
                        @endforeach
                        @if($product->images->count() < 4)
                            @for($i = $product->images->count(); $i < 4; $i++)
                                <img src="https://via.placeholder.com/100x100?text=Image+{{ $i+1 }}" alt="صورة {{ $i+1 }}" class="thumbnail" onclick="changeImage(this.src)">
                            @endfor
                        @endif
                    </div>
                </div>

                <!-- الجزء الأيسر: معلومات المنتج -->
                <div class="product-info">
                    <div class="product-meta-top">
                        @if($product->brand)
                            <span class="brand-badge">{{ $product->brand->name }}</span>
                        @endif
                        <span class="product-sku">رمز المنتج: {{ $product->sku }}</span>
                    </div>

                    <h1 class="product-title">{{ $product->name }}</h1>

                    <div class="product-rating">
                        <div class="stars">
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
                            <span class="rating-count">{{ number_format($avgRating, 1) }} ({{ $product->reviews->count() }} تقييم)</span>
                        </div>
                        <div class="sold-count">
                            <i class="fas fa-shopping-bag"></i>
                            <span>أكثر من {{ number_format($product->stock_quantity * 10) }} عملية بيع</span>
                        </div>
                    </div>

                    <div class="product-price">
                        <div class="price-wrapper">
                            <span class="current">{{ number_format($product->price / 3.75, 2) }} $</span>
                            @if($product->compare_price)
                               <span class="current">{{ number_format($product->price / 3.75, 2) }} $</span>
                               <span class="current">{{ number_format($product->price / 3.75, 2) }} $</span>
                            @endif
                        </div>
                        <div class="price-installment">
                            <i class="fas fa-credit-card"></i>
                            <span>أو قسط شهري {{ number_format($product->price / 12 / 3.75, 2) }} $ لمدة 12 شهر</span>
                        </div>
                    </div>

                    <div class="product-brief">
                        <p>{{ Str::limit($product->description, 200) }}</p>
                    </div>

                    <div class="product-actions">
                        <div class="quantity-selector">
                            <button class="qty-btn minus">-</button>
                            <input type="number" value="1" min="1" max="{{ $product->stock_quantity }}" class="qty-input">
                            <button class="qty-btn plus">+</button>
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
                        <button class="wishlist-btn" onclick="addToWishlist({{ $product->id }})">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>

                    <div class="trust-badges">
                        <div class="trust-item">
                            <i class="fas fa-truck"></i>
                            <span>توصيل مجاني للطلبات فوق 500 $</span>
                        </div>
                        <div class="trust-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>ضمان عام لمدة سنتين</span>
                        </div>
                        <div class="trust-item">
                            <i class="fas fa-undo-alt"></i>
                            <span>إرجاع مجاني خلال 14 يوم</span>
                        </div>
                    </div>

                    <div class="payment-methods">
                        <span>طرق الدفع المتاحة:</span>
                        <img src="https://via.placeholder.com/50x30?text=Visa" alt="Visa">
                        <img src="https://via.placeholder.com/50x30?text=Mastercard" alt="Mastercard">
                        <img src="https://via.placeholder.com/50x30?text=Mada" alt="Mada">
                        <img src="https://via.placeholder.com/50x30?text=ApplePay" alt="Apple Pay">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- tabs (وصف المنتج + المواصفات + التقييمات) -->
    <section class="product-tabs">
        <div class="container">
            <div class="tabs-header">
                <button class="tab-btn active" data-tab="description">وصف المنتج</button>
                <button class="tab-btn" data-tab="specs">المواصفات</button>
                <button class="tab-btn" data-tab="reviews">التقييمات ({{ $product->reviews->count() }})</button>
                <button class="tab-btn" data-tab="shipping">الشحن والإرجاع</button>
            </div>

            <div class="tabs-content">
                <!-- تبويب الوصف -->
                <div class="tab-pane active" id="description">
                    <div class="description-content">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                <!-- تبويب المواصفات -->
                <div class="tab-pane" id="specs">
                    @php
                        $specs = json_decode($product->specifications, true);
                    @endphp
                    @if($specs && count($specs) > 0)
                        <table class="specs-table">
                            @foreach($specs as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="description-content">
                            <p>لا توجد مواصفات متاحة حالياً لهذا المنتج.</p>
                        </div>
                    @endif
                </div>

                <!-- تبويب التقييمات -->
                <div class="tab-pane" id="reviews">
                    @if($product->reviews->count() > 0)
                        <div class="reviews-summary">
                            <div class="average-rating">
                                <span class="big-number">{{ number_format($avgRating, 1) }}</span>
                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $fullStars)
                                            <i class="fas fa-star"></i>
                                        @elseif($i == $fullStars + 1 && $halfStar)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span>بناءً على {{ $product->reviews->count() }} تقييم</span>
                            </div>

                            <div class="rating-bars">
                                @php
                                    $ratingsCount = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
                                    foreach($product->reviews as $review) {
                                        $ratingsCount[$review->rating]++;
                                    }
                                @endphp
                                @for($i = 5; $i >= 1; $i--)
                                    @php
                                        $percentage = $product->reviews->count() > 0 ? ($ratingsCount[$i] / $product->reviews->count() * 100) : 0;
                                    @endphp
                                    <div class="rating-bar">
                                        <span>{{ $i }} نجوم</span>
                                        <div class="bar"><div class="fill" style="width: {{ $percentage }}%"></div></div>
                                        <span>{{ $ratingsCount[$i] }}</span>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="reviews-list">
                            @foreach($product->reviews->take(5) as $review)
                                <div class="review-item">
                                    <div class="reviewer">
                                        <div class="reviewer-avatar">{{ mb_substr($review->user->name, 0, 1) }}</div>
                                        <div>
                                            <strong>{{ $review->user->name }}</strong>
                                            <div class="review-date">{{ $review->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                    <div class="review-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="review-text">{{ $review->comment }}</p>
                                    <div class="review-helpful">
                                        <span>هل كان هذا مفيداً؟</span>
                                        <button>نعم</button>
                                        <button>لا</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="description-content">
                            <p>لا توجد تقييمات لهذا المنتج بعد. كن أول من يقيم!</p>
                        </div>
                    @endif

                    <div class="add-review">
                        <h3>أضف تقييمك</h3>
                        @auth
                            <div class="rating-select">
                                <span>تقييمك:</span>
                                <i class="far fa-star" data-rating="1"></i>
                                <i class="far fa-star" data-rating="2"></i>
                                <i class="far fa-star" data-rating="3"></i>
                                <i class="far fa-star" data-rating="4"></i>
                                <i class="far fa-star" data-rating="5"></i>
                            </div>
                            <textarea id="review_comment" placeholder="اكتب تجربتك مع المنتج..."></textarea>
                            <button class="submit-review" onclick="submitReview({{ $product->id }})">إرسال التقييم</button>
                        @else
                            <p>يرجى <a href="{{ route('login') }}">تسجيل الدخول</a> لإضافة تقييم.</p>
                        @endauth
                    </div>
                </div>

                <!-- تبويب الشحن والإرجاع -->
                <div class="tab-pane" id="shipping">
                    <div class="shipping-info">
                        <h3>سياسة الشحن</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> التوصيل المجاني للطلبات فوق 500 $</li>
                            <li><i class="fas fa-check-circle"></i> مدة التوصيل: 1-3 أيام عمل داخل الرياض، 3-5 أيام لباقي المدن</li>
                            <li><i class="fas fa-check-circle"></i> يتم الشحن عبر شركة سمسا أو زاجل</li>
                            <li><i class="fas fa-check-circle"></i> تكلفة الشحن 25 $ للطلبات أقل من 500 $</li>
                        </ul>

                        <h3>سياسة الإرجاع</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> إرجاع مجاني خلال 14 يوم من تاريخ الاستلام</li>
                            <li><i class="fas fa-check-circle"></i> يجب أن يكون المنتج بحالته الأصلية مع العبوة</li>
                            <li><i class="fas fa-check-circle"></i> المنتجات المفتوحة لا تقبل الإرجاع إلا في حالة وجود عيب صناعة</li>
                            <li><i class="fas fa-check-circle"></i> يتم استرداد المبلغ خلال 7 أيام عمل</li>
                        </ul>

                        <h3>الضمان</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> ضمان عام لمدة سنتين شامل أعطال الصناعة</li>
                            <li><i class="fas fa-check-circle"></i> الضمان يشمل قطع الغيار والصيانة</li>
                            <li><i class="fas fa-check-circle"></i> مراكز الصيانة معتمدة من الوكيل</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- منتجات مشابهة -->
    <section class="related-products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">منتجات مشابهة</h2>
                <a href="{{ route('products') }}" class="view-all">عرض الكل <i class="fas fa-arrow-left"></i></a>
            </div>

            <div class="products-grid">
                @forelse($relatedProducts as $related)
                    <div class="product-card">
                        <div class="product-img">
                            <img src="{{ $related->primary_image }}" alt="{{ $related->name }}">
                        </div>
                        <div class="product-info">
                            <h3>{{ Str::limit($related->name, 40) }}</h3>
                            <div class="price">
                                <span class="current">{{ number_format($product->price / 3.75, 2) }} $</span>
                            </div>
                            <button class="add-to-cart" onclick="window.location.href='{{ route('product.details', $related->id) }}'">
                                عرض التفاصيل
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="no-products">
                        <p>لا توجد منتجات مشابهة</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        function changeImage(src) {
            document.getElementById('mainProductImage').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        // التحكم بكمية المنتج
        document.querySelector('.plus')?.addEventListener('click', function() {
            let input = document.querySelector('.qty-input');
            let max = parseInt(input.getAttribute('max'));
            let current = parseInt(input.value);
            if (current < max) {
                input.value = current + 1;
            }
        });

        document.querySelector('.minus')?.addEventListener('click', function() {
            let input = document.querySelector('.qty-input');
            let current = parseInt(input.value);
            if (current > 1) {
                input.value = current - 1;
            }
        });

        // تبديل التبويبات
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));
                let tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // دالة إضافة للسلة (مؤقتة)
        function addToCart(productId) {
            let quantity = document.querySelector('.qty-input')?.value || 1;
            alert('تم إضافة المنتج إلى السلة (سيتم تفعيل هذه الخاصية قريباً)\nالمنتج: ' + productId + '\nالكمية: ' + quantity);
        }

        // دالة إضافة للمفضلة (مؤقتة)
        function addToWishlist(productId) {
            alert('تم إضافة المنتج إلى المفضلة (سيتم تفعيل هذه الخاصية قريباً)');
        }

        // دالة إرسال التقييم
        function submitReview(productId) {
            let comment = document.getElementById('review_comment')?.value;
            if (!comment) {
                alert('الرجاء كتابة تعليقك');
                return;
            }
            alert('تم إرسال تقييمك بنجاح (سيتم تفعيل هذه الخاصية قريباً)');
        }
    </script>
</body>

</html>

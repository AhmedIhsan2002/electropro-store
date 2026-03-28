<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة المشتريات - ElectroPro</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
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
              <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
     <i class="fas fa-info-circle"></i> من نحن
 </a></li>
 <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
     <i class="fas fa-envelope"></i> اتصل بنا
 </a></li>
          </ul>
      </nav>
  </div>
</header>



    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><i class="fas fa-chevron-left"></i></li>
                <li class="active">سلة المشتريات</li>
            </ul>
        </div>
    </div>

    <!-- page header -->
    <div class="page-header">
        <div class="container">
            <h1>سلة المشتريات</h1>
            <p>مراجعة المنتجات المضافة إلى السلة</p>
        </div>
    </div>

    <!-- cart section -->
    <section class="cart-section">
        <div class="container">
            <!-- لو السلة فاضية -->
            <div class="empty-cart" style="display: none;">
                <i class="fas fa-shopping-cart"></i>
                <h3>سلتك فارغة</h3>
                <p>لم تقم بإضافة أي منتجات إلى السلة بعد</p>
                <a href="{{ route('products') }}" class="shop-now-btn">تسوق الآن</a>
            </div>

            <!-- لو السلة فيها منتجات -->
            @if($cart && $cart->items->count() > 0)
    <div class="cart-wrapper">
        <div class="cart-items">
            <div class="cart-header">
                <div>المنتج</div>
                <div>السعر</div>
                <div>الكمية</div>
                <div>الإجمالي</div>
                <div></div>
            </div>

            @foreach($cart->items as $item)
                <div class="cart-item">
                    <div class="product-info">
                        <div class="product-img">
                            <img src="{{ asset($item->product->primary_image) }}" alt="{{ $item->product->name }}">
                        </div>
                        <div class="product-details">
                            <h3>{{ $item->product->name }}</h3>
                        </div>
                    </div>
                    <span class="current">{{ number_format($product->price / 3.75, 2) }} $</span>ر
                    <div class="quantity-selector">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: flex; gap: 5px;">
                            @csrf
                            @method('PUT')
                            <button type="button" class="qty-btn minus" onclick="updateQuantity(this, -1)">-</button>
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="qty-input" onchange="this.form.submit()">
                            <button type="button" class="qty-btn plus" onclick="updateQuantity(this, 1)">+</button>
                        </form>
                    </div>
                    <div class="item-total">{{ number_format($item->total / 3.75, 2) }} $</div>
                    <div class="remove-item">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer;">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart-summary">
            <h3>ملخص الطلب</h3>
            <div class="summary-row">
                <span>المجموع الفرعي</span>
              <span class="current">{{ number_format($product->price / 3.75, 2) }} $</span>
            </div>
            <div class="summary-row">
                <span>الشحن</span>
                <span>{{ $cart->total > 500 ? 'مجاني' : '25 $' }}</span>
            </div>
            <div class="summary-row total">
                <span>الإجمالي</span>
                <span>{{ number_format($cart->total + ($cart->total > 500 ? 0 : 25)) }} $</span>
            </div>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="clear-cart-btn">تفريغ السلة</button>
            </form>
        <a href="{{ route('checkout') }}" class="checkout-btn">إتمام الشراء</a>
            <a href="{{ route('products') }}" class="continue-shopping">
                <i class="fas fa-arrow-right"></i> متابعة التسوق
            </a>
        </div>
    </div>
@else
    <div class="empty-cart">
        <i class="fas fa-shopping-cart"></i>
        <h3>سلتك فارغة</h3>
        <p>لم تقم بإضافة أي منتجات إلى السلة بعد</p>
        <a href="{{ route('products') }}" class="shop-now-btn">تسوق الآن</a>
    </div>
@endif
        </div>
    </section>

    <!-- footer - انسخه من home.blade.php -->

    <script>
        // التحكم بالكمية
        document.querySelectorAll('.quantity-selector').forEach(selector => {
            const minus = selector.querySelector('.minus');
            const plus = selector.querySelector('.plus');
            const input = selector.querySelector('.qty-input');

            minus.addEventListener('click', () => {
                let val = parseInt(input.value);
                if (val > 1) {
                    input.value = val - 1;
                }
            });

            plus.addEventListener('click', () => {
                let val = parseInt(input.value);
                input.value = val + 1;
            });
        });

        function updateQuantity(button, change) {
        let input = button.parentElement.querySelector('.qty-input');
        let newValue = parseInt(input.value) + change;
        if (newValue >= 1) {
            input.value = newValue;
            input.form.submit();
        }
    }
    </script>
</body>
</html>

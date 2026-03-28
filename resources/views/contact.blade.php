<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>من نحن - ElectroPro</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
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
              </ul>
          </nav>

        </header>
        <!-- مسار التنقل (Breadcrumb) -->
<div class="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{ route('home') }}">الرئيسية</a></li>
            <li><i class="fas fa-chevron-left"></i></li>
            <li class="active">اتصل بنا</li>
        </ul>
    </div>
</div>

<!-- عنوان الصفحة -->
<section class="contact-hero">
    <div class="container">
        <div class="contact-hero-content">
            <h1>تواصل معنا</h1>
            <p>نحن هنا للإجابة على استفساراتك ومساعدتك 24 ساعة طوال أيام الأسبوع</p>
        </div>
    </div>
</section>

<!-- معلومات الاتصال + النموذج -->
<section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- معلومات الاتصال -->
            <div class="contact-info">
                <h2>معلومات الاتصال</h2>
                <p>لا تتردد في التواصل معنا عبر أي من الطرق التالية</p>

                <div class="info-items">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>العنوان</h3>
                            <p>المملكة العربية السعودية، الرياض<br>حي النور، شارع التخصصي، مبنى 123</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>الهاتف</h3>
                            <p>+966 55 555 5555</p>
                            <p>+966 11 234 5678</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>البريد الإلكتروني</h3>
                            <p>info@electropro.com</p>
                            <p>support@electropro.com</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h3>ساعات العمل</h3>
                            <p>السبت - الخميس: 9:00 صباحاً - 10:00 مساءً</p>
                            <p>الجمعة: 4:00 مساءً - 10:00 مساءً</p>
                        </div>
                    </div>
                </div>

                <div class="contact-social">
                    <h3>تابعنا على</h3>
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

            <!-- نموذج الاتصال -->
            <div class="contact-form">
                <h2>أرسل لنا رسالة</h2>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">الاسم الكامل</label>
                        <input type="text" id="name" name="name" placeholder="أدخل اسمك" required>
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="tel" id="phone" name="phone" placeholder="أدخل رقم هاتفك">
                    </div>

                    <div class="form-group">
                        <label for="subject">الموضوع</label>
                        <input type="text" id="subject" name="subject" placeholder="موضوع الرسالة" required>
                    </div>

                    <div class="form-group">
                        <label for="message">الرسالة</label>
                        <textarea id="message" name="message" rows="5" placeholder="اكتب رسالتك هنا..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        إرسال الرسالة <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- الخريطة -->
<section class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3625.292234648345!2d46.716375!3d24.686375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDQxJzEwLjkiTiA0NsKwNDInNTkuMCJF!5e0!3m2!1sar!2ssa!4v1234567890" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>
      </body>
      </html>

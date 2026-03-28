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

    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    
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
            <li class="active">من نحن</li>
        </ul>
    </div>
</div>

<!-- قسم البطل (Hero) -->
<section class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <h1>من نحن</h1>
            <p>نحن ElectroPro، وجهتك الأولى لشراء أحدث الأجهزة الإلكترونية في السعودية</p>
        </div>
    </div>
</section>

<!-- قصة المتجر -->
<section class="about-story">
    <div class="container">
        <div class="story-wrapper">
            <div class="story-image">
                <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=600" alt="متجر ElectroPro">
            </div>
            <div class="story-content">
                <span class="story-subtitle">قصتنا</span>
                <h2>أكثر من 10 سنوات في عالم الإلكترونيات</h2>
                <p>بدأت قصة ElectroPro في عام 2014 كمتجر صغير في الرياض، وكان حلمنا بسيطاً: نوفر لعملائنا أفضل الأجهزة الإلكترونية بأفضل الأسعار مع خدمة عملاء استثنائية.</p>
                <p>اليوم، بعد أكثر من 10 سنوات، أصبحنا واحداً من أكبر المتاجر الإلكترونية في السعودية، مع آلاف العملاء السعداء وأكثر من 20,000 منتج في مخازننا.</p>
                <div class="story-features">
                    <div class="story-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>منتجات أصلية 100%</span>
                    </div>
                    <div class="story-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>ضمان عام شامل</span>
                    </div>
                    <div class="story-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>توصيل سريع لجميع المدن</span>
                    </div>
                    <div class="story-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>دعم فني 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- الإحصائيات -->
<section class="about-stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number" data-target="50000">0</div>
                <div class="stat-label">عميل سعيد</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="20000">0</div>
                <div class="stat-label">منتج</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">نسبة رضا العملاء</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="24">0</div>
                <div class="stat-label">ساعة دعم فني</div>
            </div>
        </div>
    </div>
</section>

<!-- رؤيتنا ورسالتنا -->
<section class="vision-mission">
    <div class="container">
        <div class="vision-mission-grid">
            <div class="vision-box">
                <i class="fas fa-eye"></i>
                <h3>رؤيتنا</h3>
                <p>أن نكون الخيار الأول في السعودية للتسوق الإلكتروني، ونقدم تجربة تسوق استثنائية تفوق توقعات عملائنا.</p>
            </div>
            <div class="mission-box">
                <i class="fas fa-bullseye"></i>
                <h3>رسالتنا</h3>
                <p>تمكين عملائنا من الوصول لأحدث التقنيات بأسعار منافسة، مع ضمان الجودة والموثوقية في كل منتج نبيعه.</p>
            </div>
            <div class="values-box">
                <i class="fas fa-heart"></i>
                <h3>قيمنا</h3>
                <ul>
                    <li><i class="fas fa-check"></i> الشفافية والمصداقية</li>
                    <li><i class="fas fa-check"></i> الاحترافية في العمل</li>
                    <li><i class="fas fa-check"></i> الابتكار المستمر</li>
                    <li><i class="fas fa-check"></i> خدمة العملاء أولاً</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- فريق العمل -->
<section class="our-team">
    <div class="container">
        <div class="section-header-center">
            <span class="section-subtitle">فريق العمل</span>
            <h2 class="section-title">نخبة من المحترفين في خدمتك</h2>
        </div>

        <div class="team-grid">
            <div class="team-member">
                <div class="member-img">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400" alt="أحمد العلي">
                </div>
                <h3>أحمد العلي</h3>
                <p class="member-position">المؤسس والرئيس التنفيذي</p>
                <div class="member-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="team-member">
                <div class="member-img">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400" alt="سارة عبدالله">
                </div>
                <h3>سارة عبدالله</h3>
                <p class="member-position">مديرة التسويق</p>
                <div class="member-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="team-member">
                <div class="member-img">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400" alt="محمد الحربي">
                </div>
                <h3>محمد الحربي</h3>
                <p class="member-position">مدير المشتريات</p>
                <div class="member-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="team-member">
                <div class="member-img">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400" alt="نورة القحطاني">
                </div>
                <h3>نورة القحطاني</h3>
                <p class="member-position">مديرة خدمة العملاء</p>
                <div class="member-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- شهادات العملاء -->
<section class="testimonials">
    <div class="container">
        <div class="section-header-center">
            <span class="section-subtitle">ماذا يقول عملاؤنا</span>
            <h2 class="section-title">تجارب حقيقية من عملائنا</h2>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"تعاملت مع ElectroPro أكثر من مرة، دائماً المنتجات أصلية والتوصيل سريع جداً. أنصح بالتعامل معهم."</p>
                <div class="testimonial-author">
                    <div class="author-img">ف</div>
                    <div>
                        <h4>فيصل العتيبي</h4>
                        <span>عميل منذ 3 سنوات</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"خدمة العملاء رائعة، ساعدوني في اختيار أفضل لابتوب يناسب احتياجاتي. سعر ممتاز وخدمة ما بعد البيع احترافية."</p>
                <div class="testimonial-author">
                    <div class="author-img">ن</div>
                    <div>
                        <h4>نورة الدوسري</h4>
                        <span>عميلة منذ سنتين</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"الموقع سهل الاستخدام، والمنتجات مصورة بشكل واضح. الشحن أسرع من المتوقع. تجربة تسوق ممتازة."</p>
                <div class="testimonial-author">
                    <div class="author-img">ع</div>
                    <div>
                        <h4>عبدالله السلمي</h4>
                        <span>عميل جديد</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // تحريك الأرقام في الإحصائيات
    const counters = document.querySelectorAll('.stat-number');

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / 100;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    });
</script>
</body>
</html>

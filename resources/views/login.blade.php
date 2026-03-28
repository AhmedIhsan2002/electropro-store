<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات - ElectroPro</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

</head>

<body>
  
<div class="login-container">
       <div class="login-card">
           <div class="logo">
               <h1>Electro<span>Pro</span></h1>
           </div>

           <div class="login-title">
               <h2>مرحباً بك 👋</h2>
               <p>سجل دخولك للوصول إلى حسابك</p>
           </div>

           <form action="#" method="POST">
               <div class="form-group">
                   <label>البريد الإلكتروني</label>
                   <input type="email" placeholder="example@email.com" required>
               </div>

               <div class="form-group">
                   <label>كلمة المرور</label>
                   <input type="password" placeholder="••••••••" required>
               </div>

               <div class="form-options">
                   <label class="remember-me">
                       <input type="checkbox">
                       <span>تذكرني</span>
                   </label>
                   <a href="#" class="forgot-link">نسيت كلمة المرور؟</a>
               </div>

               <button type="submit" class="login-btn">تسجيل الدخول</button>

               <div class="register-link">
                   <p>ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب جديد</a></p>
               </div>

               <div class="back-home">
                   <a href="{{ route('home') }}">
                       <i class="fas fa-arrow-right"></i>
                       العودة للرئيسية
                   </a>
               </div>
           </form>
       </div>
   </div>
</body>

</html>

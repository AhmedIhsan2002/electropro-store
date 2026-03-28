<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - ElectroPro</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* كل التصميم اللي عملناه قبل كده */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cairo', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .login-container { width: 100%; max-width: 450px; }
        .login-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: fadeInUp 0.6s ease-out; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .logo { text-align: center; margin-bottom: 30px; }
        .logo h1 { font-size: 2rem; font-weight: 800; background: linear-gradient(135deg, #0f172a, #334155); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .logo span { background: linear-gradient(135deg, #2563eb, #7c3aed); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .login-title { text-align: center; margin-bottom: 30px; }
        .login-title h2 { font-size: 1.8rem; color: #0f172a; margin-bottom: 10px; }
        .login-title p { color: #64748b; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #0f172a; }
        .form-group input { width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 10px; font-family: 'Cairo', sans-serif; transition: all 0.3s; }
        .form-group input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .form-options { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .remember-me { display: flex; align-items: center; gap: 8px; cursor: pointer; }
        .remember-me input { width: 16px; height: 16px; cursor: pointer; }
        .remember-me span { color: #475569; }
        .forgot-link { color: #2563eb; text-decoration: none; font-size: 0.9rem; }
        .forgot-link:hover { text-decoration: underline; }
        .login-btn { width: 100%; padding: 14px; background: linear-gradient(135deg, #2563eb, #7c3aed); color: white; border: none; border-radius: 10px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: opacity 0.3s; margin-bottom: 20px; }
        .login-btn:hover { opacity: 0.9; }
        .register-link { text-align: center; padding-top: 20px; border-top: 1px solid #e2e8f0; }
        .register-link p { color: #64748b; }
        .register-link a { color: #2563eb; text-decoration: none; font-weight: 600; }
        .register-link a:hover { text-decoration: underline; }
        .back-home { text-align: center; margin-top: 20px; }
        .back-home a { color: #64748b; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s; }
        .back-home a:hover { color: #2563eb; }
        .alert-danger { background: #fee2e2; color: #dc2626; padding: 12px; border-radius: 10px; margin-bottom: 20px; text-align: center; }
    </style>
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

            <!-- عرض الأخطاء إن وجدت -->
            @if ($errors->any())
                <div class="alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required autofocus>
                </div>

                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>تذكرني</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">نسيت كلمة المرور؟</a>
                    @endif
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

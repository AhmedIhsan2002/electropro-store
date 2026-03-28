<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - ElectroPro</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cairo', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .register-container { width: 100%; max-width: 500px; }
        .register-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: fadeInUp 0.6s ease-out; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .logo { text-align: center; margin-bottom: 30px; }
        .logo h1 { font-size: 2rem; font-weight: 800; background: linear-gradient(135deg, #0f172a, #334155); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .logo span { background: linear-gradient(135deg, #2563eb, #7c3aed); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .register-title { text-align: center; margin-bottom: 30px; }
        .register-title h2 { font-size: 1.8rem; color: #0f172a; margin-bottom: 10px; }
        .register-title p { color: #64748b; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #0f172a; }
        .form-group input { width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 10px; font-family: 'Cairo', sans-serif; transition: all 0.3s; }
        .form-group input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .terms { margin-bottom: 25px; }
        .terms label { display: flex; align-items: center; gap: 10px; cursor: pointer; }
        .terms input { width: 18px; height: 18px; cursor: pointer; }
        .terms span { color: #475569; font-size: 0.9rem; }
        .terms a { color: #2563eb; text-decoration: none; }
        .register-btn { width: 100%; padding: 14px; background: linear-gradient(135deg, #2563eb, #7c3aed); color: white; border: none; border-radius: 10px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: opacity 0.3s; margin-bottom: 20px; }
        .register-btn:hover { opacity: 0.9; }
        .login-link { text-align: center; padding-top: 20px; border-top: 1px solid #e2e8f0; }
        .login-link p { color: #64748b; }
        .login-link a { color: #2563eb; text-decoration: none; font-weight: 600; }
        .login-link a:hover { text-decoration: underline; }
        .back-home { text-align: center; margin-top: 20px; }
        .back-home a { color: #64748b; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s; }
        .back-home a:hover { color: #2563eb; }
        .alert-danger { background: #fee2e2; color: #dc2626; padding: 12px; border-radius: 10px; margin-bottom: 20px; text-align: center; }
        @media (max-width: 480px) { .register-card { padding: 30px 20px; } .form-row { grid-template-columns: 1fr; gap: 20px; } }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="logo">
                <h1>Electro<span>Pro</span></h1>
            </div>

            <div class="register-title">
                <h2>إنشاء حساب جديد 🎉</h2>
                <p>أهلاً بك! أدخل بياناتك للتسجيل</p>
            </div>

            @if ($errors->any())
                <div class="alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label>الاسم الأول</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="أحمد" required>
                    </div>

                    <div class="form-group">
                        <label>الاسم الأخير</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="محمد" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required>
                </div>

                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="05xxxxxxxx" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>كلمة المرور</label>
                        <input type="password" name="password" placeholder="••••••••" required>
                    </div>

                    <div class="form-group">
                        <label>تأكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="terms">
                    <label>
                        <input type="checkbox" name="terms" required>
                        <span>أوافق على <a href="#">شروط الاستخدام</a> و <a href="#">سياسة الخصوصية</a></span>
                    </label>
                </div>

                <button type="submit" class="register-btn">إنشاء حساب</button>

                <div class="login-link">
                    <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
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

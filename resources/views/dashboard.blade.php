<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - ElectroPro</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cairo', sans-serif; background: #f5f7fa; }
        .container { width: 90%; max-width: 1200px; margin: 0 auto; }

        /* شريط التنقل */
        .navbar { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 15px 0; }
        .navbar .container { display: flex; justify-content: space-between; align-items: center; }
        .logo h1 { font-size: 1.5rem; background: linear-gradient(135deg, #0f172a, #2563eb); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .nav-links { display: flex; gap: 20px; list-style: none; }
        .nav-links a { color: #1e293b; text-decoration: none; }
        .nav-links a:hover { color: #2563eb; }
        .logout-btn { background: #dc2626; color: white; padding: 8px 20px; border-radius: 8px; text-decoration: none; }

        /* Dashboard */
        .dashboard { padding: 40px 0; }
        .welcome-card { background: linear-gradient(135deg, #2563eb, #7c3aed); color: white; padding: 30px; border-radius: 20px; margin-bottom: 30px; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 40px; }
        .stat-card { background: white; padding: 20px; border-radius: 15px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .stat-number { font-size: 2rem; font-weight: 700; color: #2563eb; }
        .stat-label { color: #64748b; margin-top: 5px; }
        .recent-orders { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .recent-orders h3 { margin-bottom: 20px; color: #0f172a; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: right; border-bottom: 1px solid #e2e8f0; }
        th { color: #64748b; font-weight: 600; }
        .status { padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; }
        .status-pending { background: #fef3c7; color: #d97706; }
        .status-delivered { background: #d1fae5; color: #059669; }
        @media (max-width: 768px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <h1>ElectroPro</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><a href="{{ route('products') }}">المنتجات</a></li>
                <li><a href="{{ route('cart') }}">السلة</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn" style="border: none; cursor: pointer;">تسجيل خروج</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <main class="dashboard">
        <div class="container">
            <div class="welcome-card">
                <h2>مرحباً، {{ Auth::user()->name }}! 👋</h2>
                <p>أهلاً بعودتك إلى ElectroPro</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">0</div>
                    <div class="stat-label">إجمالي الطلبات</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">0</div>
                    <div class="stat-label">قيد المعالجة</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">0</div>
                    <div class="stat-label">تم التسليم</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">0</div>
                    <div class="stat-label">المفضلة</div>
                </div>
            </div>

            <div class="recent-orders">
                <h3>آخر الطلبات</h3>
                <table>
                    <thead>
                        <tr>
                            <th>رقم الطلب</th>
                            <th>التاريخ</th>
                            <th>الإجمالي</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" style="text-align: center; color: #64748b;">لا توجد طلبات حالياً</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>

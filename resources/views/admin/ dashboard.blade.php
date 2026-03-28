<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - ElectroPro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cairo', sans-serif; background: #f5f7fa; }
        .container { width: 95%; max-width: 1400px; margin: 0 auto; }

        /* شريط التنقل */
        .navbar { background: #0f172a; color: white; padding: 15px 0; }
        .navbar .container { display: flex; justify-content: space-between; align-items: center; }
        .logo h1 { font-size: 1.5rem; }
        .logo span { color: #2563eb; }
        .nav-links { display: flex; gap: 20px; list-style: none; }
        .nav-links a { color: white; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: background 0.3s; }
        .nav-links a:hover, .nav-links a.active { background: #2563eb; }
        .logout-btn { background: #dc2626; padding: 8px 20px; border-radius: 8px; color: white; text-decoration: none; }

        /* بطاقات الإحصائيات */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin: 30px 0; }
        .stat-card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .stat-card h3 { color: #64748b; font-size: 0.9rem; margin-bottom: 10px; }
        .stat-card .number { font-size: 2rem; font-weight: 700; color: #0f172a; }
        .stat-card .icon { float: left; font-size: 2rem; color: #2563eb; }

        /* الجداول */
        .table-container { background: white; border-radius: 15px; padding: 20px; margin-top: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: right; border-bottom: 1px solid #e2e8f0; }
        th { color: #64748b; font-weight: 600; }
        .status { padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; }
        .status-pending { background: #fef3c7; color: #d97706; }
        .btn-sm { padding: 5px 12px; background: #2563eb; color: white; border-radius: 6px; text-decoration: none; font-size: 0.85rem; }

        @media (max-width: 768px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <h1>Electro<span>Pro</span> | لوحة التحكم</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('admin.dashboard') }}" class="active">الرئيسية</a></li>
                <li><a href="{{ route('admin.products') }}">المنتجات</a></li>
                <li><a href="{{ route('admin.orders') }}">الطلبات</a></li>
                <li><a href="{{ route('admin.users') }}">المستخدمين</a></li>
            </ul>
            <div>
                <a href="{{ route('home') }}" class="logout-btn">الموقع الرئيسي</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <i class="fas fa-shopping-cart icon"></i>
                <h3>إجمالي الطلبات</h3>
                <div class="number">{{ $totalOrders }}</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-box icon"></i>
                <h3>إجمالي المنتجات</h3>
                <div class="number">{{ $totalProducts }}</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-users icon"></i>
                <h3>إجمالي المستخدمين</h3>
                <div class="number">{{ $totalUsers }}</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-dollar-sign icon"></i>
                <h3>إجمالي الإيرادات</h3>
                <div class="number">{{ number_format($totalRevenue) }} ريال</div>
            </div>
        </div>

        <div class="table-container">
            <h3 style="margin-bottom: 20px;">آخر الطلبات</h3>
            <table>
                <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th>العميل</th>
                        <th>الإجمالي</th>
                        <th>الحالة</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->user->name ?? 'غير مسجل' }}</td>
                        <td>{{ number_format($order->total) }} ريال</td>
                        <td>
                            <span class="status status-pending">{{ $order->status == 'pending' ? 'قيد المراجعة' : $order->status }}</span>
                        </td>
                        <td><a href="#" class="btn-sm">تفاصيل</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

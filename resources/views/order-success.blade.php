<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم الطلب بنجاح - ElectroPro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cairo', sans-serif; background: #f5f7fa; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .success-card { background: white; border-radius: 20px; padding: 50px; text-align: center; max-width: 500px; margin: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .success-icon { font-size: 5rem; color: #10b981; margin-bottom: 20px; }
        h1 { color: #0f172a; margin-bottom: 10px; }
        p { color: #64748b; margin-bottom: 20px; }
        .order-number { background: #f1f5f9; padding: 10px; border-radius: 10px; margin: 20px 0; font-size: 1.2rem; }
        .btn { display: inline-block; padding: 12px 30px; background: #2563eb; color: white; text-decoration: none; border-radius: 10px; margin: 10px; }
        .btn-secondary { background: #64748b; }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1>تم استلام طلبك بنجاح!</h1>
        <p>شكراً لتسوقك معنا. سنقوم بمعالجة طلبك في أقرب وقت</p>

        <div class="order-number">
            رقم الطلب: <strong>{{ $order->order_number }}</strong>
        </div>

        <p>تم إرسال تفاصيل الطلب إلى بريدك الإلكتروني</p>

        <a href="{{ route('home') }}" class="btn">العودة للرئيسية</a>
        <a href="{{ route('my.orders') }}" class="btn btn-secondary">عرض طلباتي</a>
    </div>
</body>
</html>

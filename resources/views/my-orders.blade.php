<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلباتي - ElectroPro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cairo', sans-serif; background: #f5f7fa; }
        .container { width: 90%; max-width: 1200px; margin: 0 auto; }
        .page-header { padding: 40px 0; text-align: center; }
        .orders-table { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; text-align: center; border-bottom: 1px solid #e2e8f0; }
        th { background: #f8fafc; color: #0f172a; font-weight: 600; }
        .status { padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; display: inline-block; }
        .status-pending { background: #fef3c7; color: #d97706; }
        .status-processing { background: #dbeafe; color: #2563eb; }
        .status-shipped { background: #e0e7ff; color: #4f46e5; }
        .status-delivered { background: #d1fae5; color: #059669; }
        .status-cancelled { background: #fee2e2; color: #dc2626; }
        .btn { padding: 8px 20px; background: #2563eb; color: white; text-decoration: none; border-radius: 8px; font-size: 0.9rem; }
        .no-orders { text-align: center; padding: 60px; background: white; border-radius: 15px; }
        @media (max-width: 768px) { th, td { padding: 10px; font-size: 0.85rem; } .btn { padding: 5px 12px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>طلباتي</h1>
            <p>جميع طلباتك السابقة والحالية</p>
        </div>

        @if($orders->count() > 0)
            <div class="orders-table">
                <table>
                    <thead>
                        <tr>
                            <th>رقم الطلب</th>
                            <th>التاريخ</th>
                            <th>الإجمالي</th>
                            <th>الحالة</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>{{ number_format($order->total) }} ريال</td>
                            <td>
                                @php
                                    $statusClass = [
                                        'pending' => 'status-pending',
                                        'processing' => 'status-processing',
                                        'shipped' => 'status-shipped',
                                        'delivered' => 'status-delivered',
                                        'cancelled' => 'status-cancelled',
                                    ][$order->status] ?? 'status-pending';

                                    $statusText = [
                                        'pending' => 'قيد المراجعة',
                                        'processing' => 'قيد المعالجة',
                                        'shipped' => 'تم الشحن',
                                        'delivered' => 'تم التسليم',
                                        'cancelled' => 'ملغي',
                                    ][$order->status] ?? $order->status;
                                @endphp
                                <span class="status {{ $statusClass }}">{{ $statusText }}</span>
                            </td>
                            <td>
                                <a href="{{ route('order.details', $order->id) }}" class="btn">تفاصيل</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 30px;">
                {{ $orders->links() }}
            </div>
        @else
            <div class="no-orders">
                <i class="fas fa-shopping-bag" style="font-size: 4rem; color: #cbd5e1; margin-bottom: 20px;"></i>
                <h3>لا توجد طلبات بعد</h3>
                <p>لم تقم بإجراء أي طلبات حتى الآن</p>
                <a href="{{ route('products') }}" class="btn" style="margin-top: 20px;">تسوق الآن</a>
            </div>
        @endif
    </div>
</body>
</html>

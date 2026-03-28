<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إتمام الشراء - ElectroPro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cairo', sans-serif; background: #f5f7fa; }
        .container { width: 90%; max-width: 1200px; margin: 0 auto; }

        .checkout-wrapper {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 30px;
            padding: 40px 0;
        }

        .checkout-form {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .form-section h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #0f172a;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #0f172a;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-family: 'Cairo', sans-serif;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .payment-options {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .payment-option {
            flex: 1;
            padding: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
        }

        .payment-option.active {
            border-color: #2563eb;
            background: #eff6ff;
        }

        .order-summary {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            position: sticky;
            top: 20px;
        }

        .order-summary h3 {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        .cart-items {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .cart-item-img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
        }

        .cart-item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-info h4 {
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .cart-item-price {
            font-size: 0.9rem;
            color: #2563eb;
            font-weight: 600;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }

        .summary-row.total {
            font-size: 1.2rem;
            font-weight: 700;
            border-top: 1px solid #e2e8f0;
            margin-top: 10px;
            padding-top: 15px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 20px;
        }

        @media (max-width: 992px) {
            .checkout-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="checkout-wrapper">
            <form action="{{ route('order.store') }}" method="POST" class="checkout-form">
                @csrf

                <div class="form-section">
                    <h3>معلومات الشحن</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>الاسم الكامل *</label>
                            <input type="text" name="name" value="{{ Auth::user()->name ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكتروني *</label>
                            <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>رقم الهاتف *</label>
                        <input type="tel" name="phone" value="{{ Auth::user()->phone ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label>العنوان *</label>
                        <input type="text" name="address" placeholder="الشارع، الحي، المدينة" required>
                    </div>

                    <div class="form-group">
                        <label>المدينة *</label>
                        <input type="text" name="city" placeholder="الرياض، جدة، الدمام..." required>
                    </div>

                    <div class="form-group">
                        <label>ملاحظات إضافية</label>
                        <textarea name="notes" rows="3" placeholder="أي ملاحظات إضافية للطلب..."></textarea>
                    </div>
                </div>

                <div class="form-section">
                    <h3>طريقة الدفع</h3>
                    <div class="payment-options">
                        <div class="payment-option active" data-method="cod">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>الدفع عند الاستلام</span>
                        </div>
                        <div class="payment-option" data-method="card">
                            <i class="fas fa-credit-card"></i>
                            <span>بطاقة ائتمان</span>
                        </div>
                        <div class="payment-option" data-method="bank_transfer">
                            <i class="fas fa-university"></i>
                            <span>تحويل بنكي</span>
                        </div>
                    </div>
                    <input type="hidden" name="payment_method" value="cod" id="payment_method">
                </div>

                <button type="submit" class="submit-btn">تأكيد الطلب</button>
            </form>

            <div class="order-summary">
                <h3>ملخص الطلب</h3>
                <div class="cart-items">
                    @foreach($cart->items as $item)
                        <div class="cart-item">
                            <div class="cart-item-img">
                                <img src="{{ asset($item->product->primary_image) }}" alt="{{ $item->product->name }}">
                            </div>
                            <div class="cart-item-info">
                                <h4>{{ $item->product->name }}</h4>
                                <div class="cart-item-price">{{ number_format($item->price) }} $ × {{ $item->quantity }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @php
                    $subtotal = $cart->total;
                    $shipping = $subtotal > 500 ? 0 : 25;
                    $total = $subtotal + $shipping;
                @endphp

                <div class="summary-row">
                    <span>المجموع الفرعي</span>
                    <span>{{ number_format($subtotal) }} $</span>
                </div>
                <div class="summary-row">
                    <span>الشحن</span>
                    <span>{{ $shipping == 0 ? 'مجاني' : number_format($shipping) . ' $' }}</span>
                </div>
                <div class="summary-row total">
                    <span>الإجمالي</span>
                    <span>{{ number_format($total) }} $</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.payment-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.payment-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('payment_method').value = this.dataset.method;
            });
        });
    </script>
</body>
</html>

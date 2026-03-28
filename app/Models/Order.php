<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'order_number',
      'user_id',
      'name',
      'email',
      'phone',
      'address',
      'city',
      'subtotal',
      'shipping_cost',
      'total',
      'payment_method',
      'status',
      'notes',
    ];

    // العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع عناصر الطلب
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

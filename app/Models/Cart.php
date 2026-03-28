<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع عناصر السلة
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }


    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }

    
    public function getTotalItemsAttribute()
    {
        $count = 0;
        foreach ($this->items as $item) {
            $count += $item->quantity;
        }
        return $count;
    }
}

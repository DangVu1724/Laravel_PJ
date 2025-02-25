<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total',
    ];

    // Quan hệ với bảng order_items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Quan hệ với bảng users (nếu có)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


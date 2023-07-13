<?php

namespace App\Models;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'cart',
        'note',
        'address',
        'phone_number',
        'paymentNumber',
        'total',
        'trxId',
        'payment_method',
        'amount',
        'payment_status',
        'cash_app_tag',
        'quantity',
        'product_id'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function product()
{
    return $this->hasMany(Product::class);
}
}

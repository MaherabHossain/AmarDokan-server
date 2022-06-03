<?php

namespace App\Models;
use App\Models\User;
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
        'payment_method'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}

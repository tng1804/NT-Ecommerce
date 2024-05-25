<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =['id','user_id','name','email','phone','address','status'];
    public function orderDetails()
    {
        return $this->hasMany(Order_product::class, 'id', 'order_id');
    }
}

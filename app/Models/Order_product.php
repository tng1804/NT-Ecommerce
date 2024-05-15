<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Liên kết 2 bảng, để truy vấn
    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}

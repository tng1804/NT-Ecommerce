<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','user_id', 'quantity', 'price'];

    // Liên kết 2 bảng, để truy vấn
    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}

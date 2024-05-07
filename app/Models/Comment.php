<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content','user_id', 'product_id'];

    // Liên kết 2 bảng, để truy vấn
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

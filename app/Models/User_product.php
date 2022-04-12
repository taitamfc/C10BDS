<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_product extends Model
{
    use HasFactory;

    protected $table = 'user_product';
    protected $fillable = ['id', 'user_id', 'product_id'];

    public $timestamps = false;

    function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}

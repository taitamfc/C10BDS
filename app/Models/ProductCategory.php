<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class ProductCategory extends Model
{
    use HasFactory,SoftDeletes;// add soft delete
    
    protected $table = 'product_categories';

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

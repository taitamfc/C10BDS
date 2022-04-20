<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory,SoftDeletes; // add soft delete

    protected $table = 'products';
    protected $fillable = [
        'id', 'name', 'address','price', 'description','product_category_id',
        'area', 'juridical', 'google_map', 'stress_width','houseDirection' , 'unit', 'facade', 'linkYoutube',
        'district_id', 'province_id', 'ward_id','user_id','branch_id'
    ];

    public function product_logs()
    {
        return $this->hasMany(Product_log::class);
    }

    public function product_images()
    {
        return $this->hasMany(Product_image::class);
    }
    public function productCategory()
    {
        return $this->belongto(ProductCategory::class, 'product_category_id', 'id');
    }
    public function province()
    {
        return $this->belongto(Province::class, 'province_id', 'id');
    }
    public function district()
    {
        return $this->belongto(District::class, 'district_id', 'id');
    }
    public function ward()
    {
        return $this->belongto(Ward::class, 'ward_id', 'id');
    }

    public function user_products() {
        return $this->belongsToMany(User_product::class);
    }
    
}

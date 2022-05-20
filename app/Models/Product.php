<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes; // add soft delete

    protected $table = 'products';
    
    public function product_logs()
    {
        return $this->hasMany(ProductLog::class)->orderBy('created_at','DESC');
    }
    public function product_customers()
    {
        return $this->hasMany(ProductCustomer::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

    public function user_products() {
        return $this->belongsToMany(User_product::class);
    }
    
}

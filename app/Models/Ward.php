<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';
    protected $fillable = [
        'id', 'name', 'district_id'
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}

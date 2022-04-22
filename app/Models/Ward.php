<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';


    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id','id');
    }
}

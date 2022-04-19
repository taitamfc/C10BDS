<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';
    protected $fillable = [
        'id', 'name', 'gender', 'day_of_birth', 'address', 'email', 'password', 'start_day',
        'user_group_id', 'branch_id', 'note', 'province_id', 'district_id', 'ward_id'
    ];
    public $timestamps = false;

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id', 'id');
    }

    public function province()
    {
        return $this->belongsto(Province::class, 'province_id', 'id');
    }
    public function district()
    {
        return $this->belongsto(District::class, 'district_id', 'id');
    }
    public function ward()
    {
        return $this->belongsto(Ward::class, 'ward_id', 'id');
    }


    public function user_product()
    {
        return $this->belongsToMany(User_product::class);
    }
}

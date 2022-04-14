<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['id','name','day_of_birth','address','email','password','start_day',
    'user_group_id','branch_id','note'];
    public $timestamps = false;

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }
    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class,'user_group_id','id');
    }

    public function user_product() {
        return $this->belongsToMany(User_product::class);
    }

}

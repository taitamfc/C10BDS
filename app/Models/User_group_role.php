<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_group_role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'id', 'user_group_id', 'role_id'
    ];
    public $timestamps = false;

    function user_group(){
        return $this->belongsTo(UserGroup::class, 'users_group_id', 'id');
    }
    function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}

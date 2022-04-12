<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    protected $table = 'user_groups';
    protected $fillable = ['id', 'name', 'description'];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function user_group_role() {
        return $this->belongsToMany(User_group_role::class,);
    }
}

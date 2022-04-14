<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
         'name'
    ];
    public $timestamps = false;

    public function user_group_role() {
        return $this->belongsToMany(User_group_role::class);
    }
}

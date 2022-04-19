<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';
    protected $fillable = [
         'name', 'group_name',
    ];
    public $timestamps = false;
}

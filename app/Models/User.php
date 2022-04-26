<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasPermissions;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes;// add soft delete
    use Notifiable, HasPermissions;// add soft delete

    protected $table = 'users';

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

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}

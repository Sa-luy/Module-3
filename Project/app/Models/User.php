<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $guards =[]; 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function roles(){
        return $this->belongsToMany(Role::class,'role_user','role_id','user_id');
    }
    public function hasPermission($permissionCheck)
    {
        //b1 laasy dc tat car quyen cura user dang login vao he thong
        //b2so sanh gia trij cura route hien tai voiws casc quyen o buoc 1
        //neu co return true, neu khong return fasle
        $roles =auth()->user()->roles;
       foreach ($roles as  $role){
      $permission_name = $role->permissions;
      if($permission_name->contains('name',$permissionCheck)){
        return true;
      }
    }
    return false;

    }

}

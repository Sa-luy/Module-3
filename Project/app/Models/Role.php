<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $guard=[];
    protected $fillable = [
        'name',
        'display_name',
      
    ];
    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }
    public function attachPermissions($permissions) {
        $this->permissions()->attach($permissions);
    }
    
}

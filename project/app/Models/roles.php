<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    /** @use HasFactory<\Database\Factories\RolesFactory> */
    use HasFactory;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'rolespermissions','role_id','permission_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

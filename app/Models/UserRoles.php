<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Models
{
    use HasFactory;

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(UserRolePermission::class);
    }
}
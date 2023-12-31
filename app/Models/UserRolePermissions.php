<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRolePermissions extends Models
{
    use HasFactory;

    public function userRole()
    {
        return $this->belongTo(UserRole::class);
    }

    
    
}
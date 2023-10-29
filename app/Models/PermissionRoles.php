<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRoles extends Model
{
    use HasFactory;

    protected $table = 'permission_roles';

    protected $fillable = ['name', 'created_at', 'created_by', 'updated_at', 'updated_by', 'company', 'date', 'status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['name', 'menu_id', 'submenu_id', 'permission_link', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'];
}

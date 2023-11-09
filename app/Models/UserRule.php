<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRule extends Model
{
    use HasFactory;

    protected $table = 'users_rules';

    protected $fillable = ['user_id', 'company', 'created_at', 'updated_at', 'created_by', 'rule_id', 'status'];
}

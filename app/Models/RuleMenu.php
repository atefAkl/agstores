<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleMenu extends Model
{
    use HasFactory;

    protected $table = 'rules_menues';

    protected $fillable = ['rule_id', 'menu_id', 'company', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'];
}

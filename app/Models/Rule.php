<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    public $menues = [];
    protected $table = 'rules';

    protected $fillable = ['name', 'company', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'];
}

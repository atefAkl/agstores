<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';
    protected $fillable = ['number', 'size', 'capacity', 'serial', 'company', 'created_by', 'updated_by', 'created_at', 'updated_at', 'status'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = ['a_name', 'code', 'status', 'size', 'store', 'serial', 'e_name', 'company', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use HasFactory;

    protected $table = 'main_menues';

    protected $fillable = ['name', 'company', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'];
}

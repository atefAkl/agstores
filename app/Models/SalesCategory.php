<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesCategory extends Model
{ 
    use HasFactory;
    protected $table = 'sales_categories';

    protected $fillable = ['name', 'created_at', 'updated_at', 'created_by', 'updated_by', 'company', 'status', 'parent'];

    public static function buildCatsArray () {
        
    }
}

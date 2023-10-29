<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    use HasFactory;
 
    protected $table = 'store_items';
    protected $fillable = ['name', 'pic', 'company', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}

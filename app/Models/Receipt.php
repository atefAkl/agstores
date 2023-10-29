<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $table = 'receipts';
    protected $fillable = ['type', 'greg_date', 'hij_date', 'contract', 'farm', 'driver', 'notes', 's_number', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}

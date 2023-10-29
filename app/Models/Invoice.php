<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $fillable = ['name', 'client', 'type', 'number', 'company', 'status', 'discount', 'VAT', 'TAX', 
            'claiming_at', 'account', 'created_at', 'created_by', 'Updated_at', 'updated_by'];
}

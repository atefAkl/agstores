<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractItem extends Model
{
    use HasFactory;
    protected $table = 'contract_items';
    protected $fillable = [
        'item', 'qty', 'unit', 'price', 'status', 'contract',
        'company', 'created_by', 'updated_by', 
        'created_at', 'updated_at'];

}

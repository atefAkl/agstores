<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 'table_id', 'qty', 'table_size', 
        'store_point', 'date', 'box_size', 
        'client_id', 'contract_id', 'receipt_id', 'item_id', 
        'created_by', 'updated_by', 'created_at', 'updated_at'];
}

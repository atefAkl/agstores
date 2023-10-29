<?php

namespace App\Models;

use App\Models\ContractItem;
use App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';
    protected $fillable = [
        'code', 'brief', 'start_period', 'renew_period', 'in_day_greg', 
        'in_day_hij', 'client',  'starts_in_greg', 'starts_in_hij', 
        'ends_in_greg', 'ends_in_hij', 'type', 's_number', 'status', 
        'company', 'created_by', 'updated_by', 
        'created_at', 'updated_at'];


    public const default_starting_period = 3;
    public function client() {
        return $this -> belongsTo('App\Models\Client', 'Client', 'id');
    }

    public function checkLargeTablesCredit () {
        $credit = ContractItem::where(['contract' => $this->id, 'item' => 1])->first();
        $this->largeTablesCredit = $credit->qty;
        $consumed = Table::where(['contract_id'=> $this->id, 'size' => 2])->get();
        $this->largeTablesConsumed = count($consumed);
        return $this->largeTablesConsumed;//-$this->largeTablesConsumed > 0;
    }

    public function getLargeTablesCredit() {
        $credit = ContractItem::where(['contract' => $this->id, 'item' => 1])->first();
        return $credit->qty;
    }

    public function isApproved () {
        return $this->status == 1;
    }

    public function isActive() {
        return $this->starts_in_greg <= date('Y-m-d H:i:s') && $this->ends_in_greg >= date('Y-m-d H:i:s');
    }
}
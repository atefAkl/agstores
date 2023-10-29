<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = ['name', 'scope', 's_number', 'logo', 
                            'website', 'phone', 'state', 'city', 'email', 'street', 
                            'vat', 'cr', 'person', 'iqama', 'files', 'company', 
                            'created_by', 'updated_by', 'created_at', 'updated_at', 'status'
                        ];

    public function contracts ()  {
        return $this->hasMany('App\Models\Contract', 'client', 'id');
    }
}

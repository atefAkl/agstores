<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = 'users_profiles';
    protected $fillable = [
        'firstName', 'lastName', 'title', 'gender', 'dob', 'natId', 'profileImage', 'userId', 'updated_at', 'phone', 'company_name', 'profession'
    ];

    public static function initiateNewProfile($req) {
        $p = new self();
        $p->firstName           = $req->firstName;
        $p->lastName            = $req->lastName;
        $p->natId               = $req->natId;
        $p->dob                 = $req->dob;
        $p->profession          = $req->profession;

        $p->title = $req->title != null ?  $req->title : '';
        $p->gender = $req->gender != null ?  $req->gender : '';
        $p->phone = $req->phone != null ?  $req->phone : '';
        return $p;
    }
}

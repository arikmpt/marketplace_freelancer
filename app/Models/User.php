<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'username','email','password','name','birthdate',
        'gender','address','state','city','district','sub_district',
        'postal_code','phone','about','is_admin','uuid'
    ];
}

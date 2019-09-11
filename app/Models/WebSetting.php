<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    protected $table = 'web_settings';

    protected $fillable = [
        'title','meta_keyword','meta_description',
        'logo','favicon'
    ];
}

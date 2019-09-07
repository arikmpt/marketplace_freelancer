<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function my()
    {
        return view('pages.profile.own.index');
    }
}

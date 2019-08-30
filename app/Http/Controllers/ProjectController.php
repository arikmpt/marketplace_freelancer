<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function guestList()
    {
        return view('pages.projects.guest.list');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function guestList()
    {
        return view('pages.projects.guest.list');
    }

    public function guestDetail()
    {
        return view('pages.projects.guest.detail');
    }

    public function ownList()
    {
        return view('pages.projects.user.index');
    }
}

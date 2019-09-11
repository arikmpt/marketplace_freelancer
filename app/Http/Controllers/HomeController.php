<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.homepage.index')
            ->with([
                'projects' => Project::where('is_approve', 1)->count(),
                'users' => User::count()
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectSkill;
use App\Models\User;
use App\Models\Skill;
use App\Helpers\Crud;
use Validator;
use Auth;
use Carbon\Carbon;

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

    public function ownList(User $user)
    {

        return view('pages.projects.user.index')
            ->with([
                'projects' => Project::where('user_id', Auth::user()->id)->where('created_at', '>', Carbon::now()->subDays(15))->get()
            ]);
    }

    public function new()
    {
        return view('pages.projects.user.form.new')
            ->with([
                'categories' => Category::pluck('name','id'),
                'skills' =>  Skill::pluck('name','name')
                ]);
    }

    public function save(Request $request, Project $project, ProjectSkill $projectskill)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'published_budget' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
        
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $store = Crud::save($project, $data);

        foreach($request->skills as $skill)
        {
            $data['project_id'] = $store->id;
            $data['name'] = $skill;
            $store = Crud::save($projectskill, $data);
        }

        return $store ? redirect()->route('profile.project.list')->with('success','Proyek Berhasil Di ajukan, Silakan Tunggu Verifikasi Dari Admin')
                : redirect()->back()->with('danger','Terjadi Kesalahan')->withInput();
    }
}

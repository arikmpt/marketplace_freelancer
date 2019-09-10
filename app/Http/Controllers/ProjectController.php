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
use Storage;

class ProjectController extends Controller
{
    public function guestList()
    {
        return view('pages.projects.guest.list')
        ->with([
            'projects' => Project::where('is_approve', 1)->where('winner_id',null)
                ->where('created_at', '>', Carbon::now()->subDays(15))->paginate(15),
            'categories' => Category::get()
        ]);
    }

    public function guestListByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('pages.projects.guest.list')
        ->with([
            'projects' => Project::where('is_approve', 1)->where('winner_id',null)->where('category_id', $category->id)
                    ->where('created_at', '>', Carbon::now()->subDays(15))->paginate(15),
            'categories' => Category::get()
        ]);
    }

    public function guestDetail($uuid)
    {
        return view('pages.projects.guest.detail')
            ->with([
                'project' => Project::where('uuid', $uuid)->firstOrFail()
            ]);
           
    }

    public function ownList(User $user)
    {

        return view('pages.projects.user.index')
            ->with([
                'projects' => Project::where('user_id', Auth::user()->id)
                    ->where('created_at', '>', Carbon::now()->subDays(15))
                    ->orWhere('winner_id', Auth::user()->id)->get(),
                'old_projects' => Project::where('user_id', Auth::user()->id)
                    ->where('created_at', '<', Carbon::now()->subDays(15))->get()
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

    public function edit($uuid, Project $project)
    {
        return view('pages.projects.user.form.edit')
            ->with([
                'categories' => Category::pluck('name','id'),
                'skills' =>  Skill::pluck('name','name'),
                'project' => $project->where('uuid', $uuid)->firstOrFail()
            ]);
    }

    public function detail($uuid, Project $project)
    {
        return view('pages.projects.user.detail')
            ->with(['project' => $project->where('uuid', $uuid)->firstOrFail()]);
    }

    public function save(Request $request, Project $project, ProjectSkill $projectskill)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'published_budget' => 'required',
            'description' => 'required',
            'finish_day' => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
        
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'menunggu persetujuan admin';

        if($request->file('attachment'))
        {
            $data['attachment'] = $this->upload($request->file('attachment'), 'projects/');
        }

        $store = Crud::save($project, $data);

        foreach($request->skills as $skill)
        {
            $form['project_id'] = $store->id;
            $form['name'] = $skill;
            $save = Crud::save($projectskill, $form);
        }

        return $save ? redirect()->route('profile.project.list')->with('success','Proyek Berhasil Di ajukan, Silakan Tunggu Verifikasi Dari Admin')
                : redirect()->back()->with('danger','Terjadi Kesalahan')->withInput();
    }

    public function update(Request $request, Project $project, ProjectSkill $projectskill)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'published_budget' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
        
        $data = $request->except('_token','id','skills');
        $data['user_id'] = Auth::user()->id;

        if($request->file('attachment'))
        {
            $data['attachment'] = $this->upload($request->file('attachment'), 'projects/');
        }

        // dd($data);
        $store = Crud::update($project, $data, 'id', $request->id);

        $delete = $projectskill->where('project_id', $request->id)->delete(); 

        foreach($request->skills as $skill)
        {
            $form['project_id'] = $request->id;
            $form['name'] = $skill;
            $save = Crud::save($projectskill, $form);
        }

        return $save ? redirect()->route('profile.project.list')->with('success','Proyek Berhasil Di ajukan, Silakan Tunggu Verifikasi Dari Admin')
                : redirect()->back()->with('danger','Terjadi Kesalahan')->withInput();
    }

    public function delete(Request $request, Project $project, ProjectSkill $projectskill)
    {
        $data = $project->where('id', $request->id)->firstOrFail();
        $projectskill->where('project_id', $request->id)->delete();

        $destroy = $data->delete();

        return $destroy ? redirect()->route('profile.project.list')->with('success','Proyek Berhasil Di hapus')
                : redirect()->back()->with('danger','Terjadi Kesalahan');
    }

    private function upload($data, $location)
    {
        $fileName = str_random(20).'.'.$data->getClientOriginalExtension();
        $path = 'uploads/'.$location.$fileName;
        $process = Storage::disk('public')->put($path, file_get_contents($data),'public');

        return $path;
    }
}

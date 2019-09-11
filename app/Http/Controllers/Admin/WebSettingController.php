<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Storage;

class WebSettingController extends Controller
{
    public function index()
    {
        $setting = WebSetting::first();

        return view('pages.admin.setting.index')
            ->with([
                'setting' => $setting
            ]);
    }

    public function store(Request $request)
    {
        $setting = WebSetting::updateOrCreate(
            ['id' => 1],
            [
                'title' => $request->title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'logo' => $request->file('logo') ? $this->upload($request->file('logo'), 'setting/') : null,
                'favicon' => $request->file('favicon') ? $this->upload($request->file('favicon'), 'setting/') : null
            ]
        );

        return $setting ? redirect()->back()->with('success' ,'Data Berhasil Tersimpan') 
            : redirect()->back()->with('danger' ,'Terjadi Kesalahan') ;
    }

    private function upload($data, $location)
    {
        $fileName = str_random(20).'.'.$data->getClientOriginalExtension();
        $path = 'uploads/'.$location.$fileName;
        $process = Storage::disk('public')->put($path, file_get_contents($data),'public');

        return $path;
    }
}

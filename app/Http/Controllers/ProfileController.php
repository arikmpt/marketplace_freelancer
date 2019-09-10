<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectBid;
use App\Helpers\Crud;
use Validator;
use Auth;
use Storage;

class ProfileController extends Controller
{
    public function my()
    {
        $province = Province::where('name', Auth::user()->state)->first();
        $city = Regency::where('name', Auth::user()->city)->first();
        $district = District::where('name', Auth::user()->district)->first();
        $bids = ProjectBid::where('user_id', Auth::user()->id)->get();

        return view('pages.profile.own.index')
        ->with([
            'states' => Province::orderBy('name','asc')->pluck('name','name'),
            'cities' => $province ? $province->regencies->pluck('name','name') : [],
            'districts' => $city ? $city->districts->pluck('name','name') : [],
            'villages' => $district ? $district->villages->pluck('name','name') : [],
            'projects' => Project::where('user_id', Auth::user()->id)
                ->orWhere('winner_id', Auth::user()->id)->get(),
            'bids' => $bids
            ]);
    }

    public function guest($uuid)
    {
        $profile = User::where('uuid', $uuid)->firstOrFail();
        return view('pages.profile.guest.index')
            ->with(['profile' => $profile]);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'numeric',
            'birthdate' => 'date',
            'postal_code' => 'numeric'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        

        $data = $request->except('_token');

        if($request->file('photo'))
        {
            $data['photo'] = $this->upload($request->file('photo'), 'profile/');
        }

        $store = Crud::update($user, $data,'id', Auth::user()->id);

        return $store ? redirect()->route('profile.me')->with('success','Perbaruhi Profil Berhasil')
            : redirect()->back()->with('danger','Terjadi Kesalahan')->withInput();
    }

    public function getCitiesByState(Request $request)
    {
        $province = Province::where('name', $request->state_name)->first();
        return $province ? response()->json([
            'success' => true,
            'data' => $province->regencies
        ], 200) : response()->json([
            'success' => true,
            'message' => 'Something went wrong'
        ], 500);
    }

    public function getDistricsByCitiy(Request $request)
    {
        $regency = Regency::where('name', $request->city_name)->first();
        return $regency ? response()->json([
            'success' => true,
            'data' => $regency->districts
        ], 200) : response()->json([
            'success' => true,
            'message' => 'Something went wrong'
        ], 500);
    }

    public function getVillagesByDistrict(Request $request)
    {
        $district = District::where('name', $request->district_name)->first();
        return $district ? response()->json([
            'success' => true,
            'data' => $district->villages
        ], 200) : response()->json([
            'success' => true,
            'message' => 'Something went wrong'
        ], 500);
    }

    private function upload($data, $location)
    {
        $fileName = str_random(20).'.'.$data->getClientOriginalExtension();
        $path = 'uploads/'.$location.$fileName;
        $process = Storage::disk('public')->put($path, file_get_contents($data),'public');

        return $path;
    }
}

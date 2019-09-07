<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\User;
use App\Helpers\Crud;
use Validator;
use Auth;

class ProfileController extends Controller
{
    public function my()
    {
        return view('pages.profile.own.index')
        ->with(['states' => Province::orderBy('name','asc')->pluck('name','name') ]);
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
}

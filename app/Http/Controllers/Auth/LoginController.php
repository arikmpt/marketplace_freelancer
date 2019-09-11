<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('pages.auth.login');
    }

    public function indexAdmin()
    {
        return view('layouts.admin.auth');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
        
        if(Auth::attempt(['email' => $request->username, 'password' => $request->password]) || Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            return redirect()->route('profile.me');
            
        } else {
            return redirect()->back()->with('danger','Nama Pengguna Atau Password Anda Tidak Tepat');
        }

    }

    public function loginAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1]))
        {
            return redirect()->route('admin.dashboard');
            
        } else {
            return redirect()->back()->with('danger','Nama Pengguna Atau Password Anda Tidak Tepat');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
}

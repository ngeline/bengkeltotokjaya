<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Login Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles authenticating users for the application and
//     | redirecting them to your home screen. The controller uses a trait
//     | to conveniently provide its functionality to your applications.
//     |
//     */

//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = RouteServiceProvider::HOME;

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }
// }

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
        ])){
    		//jika login sukses
    		return redirect()->route('admin.home');
    	}elseif(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2,
        ])){
    		//jika login sukses
    		return redirect()->route('pemilik.home');
    	}elseif(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 0,
        ])){
    		//jika login sukses
    		return redirect()->route('home');
    	}
    	else{
    		//jika gagal login
    		// return redirect()->route('login')->with('error', "email dan password salah");
            return back()->withErrors([
                'errors' => "Email atau Password anda salah."
            ]);
    	}
    }


    public function reject(){
    	return view('layouts.reject');
    }

    //menampilkan halaman rejetrole
    public function rejectrole(){
    	return view('layouts.rejectrole');
    }

}

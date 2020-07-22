<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

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
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:users')->except('logout');
    }


    public function showUserLogin()
    {
        return view('auth.login', ['url' => 'users']);
    }


    public function showAdminLogin()
    {
        return view('auth.login', ['url' => 'admins']);
    }

    public function adminLogin(Request $request)
    {

        $loginData = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($loginData) ){
            return redirect()->intended('/admins');
        }
        return $this->sendFailedLoginResponse($request);


    }


    public function userLogin(Request $request)
    {
        $loginData = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('users')->attempt($loginData) ){
            return redirect()->intended('/users');
        }

        return $this->sendFailedLoginResponse($request);
    }


    public function username()
    {
        return 'username';
    }

}

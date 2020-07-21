<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
//        $this->middleware('guest')->except('logout');
//        $this->middleware('guest:admin')->except('logout');
//        $this->middleware('guest:users')->except('logout');
    }


    public function showUserLogin()
    {
        return view('auth.login', ['url' => 'users']);
    }


    public function showAdminLogin()
    {
        return view('auth.login', ['url' => 'admins']);
    }

    public function adminLogin()
    {
        return view('admin.admin_home');
    }


    public function userLogin()
    {
        return view('user.user_home');
    }



}

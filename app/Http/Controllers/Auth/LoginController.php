<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Function that redirects to the login page
     *
     */
    public function showLogin()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $email          = $request['email'];
        $password       = $request['password'];

        if ( Auth::attempt(['email' => $email, 'password' => $password]) )
            return redirect()->route('home');
        return redirect()->back(); 
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

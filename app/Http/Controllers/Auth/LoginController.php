<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;


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
            return redirect()->route('admin.index');
        return redirect()->back(); 
    }

    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {         
        
        $rules = array(
            'userName'  => 'required|alpha_spaces|min:3',
            'email'     => 'required|email',
            'password'  => 'required|alphaNum|min:3',
            'repassword'=> 'required|same:password'
        );
        

        $validator = \Validator::make(Input::all(), $rules);

        if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator->messages());
                

        $usr = new User();
        $usr->name = $request['userName'];
        $usr->email = $request['email'];
        $file = $request->file('foto');
        if($file != NULL){
            $storagePath = storage_path().'/app/public/fotos/';
            $fileName = time(). '.' .$file->getClientOriginalExtension();
            $file->move($storagePath, $fileName);
            $usr->foto = $fileName;
        }       
        $usr->password = \Hash::make( $request['password'] );

                
        $usr->save();
        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}

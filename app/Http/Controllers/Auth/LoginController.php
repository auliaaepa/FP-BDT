<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    protected function authenticated () 
    {
        if ( Auth::user()->role == "admin" ) {
            return redirect()->route('admin.home')->with('success_message', 'you have successfully logged in. Welcome ' . Auth::user()->name . ' !');
        } else if ( Auth::user()->role == "user" ) {
            return redirect()->route('user.home')->with('success_message', 'you have successfully logged in. Welcome ' . Auth::user()->name . ' !');
        } 

        // return redirect('/home');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role_id == "admin") {
            $this->redirectTo = route('admin.home');
        } else if (Auth::check() && Auth::user()->role_id == "user") {
            $this->redirectTo = route('user.home');
        } 

        $this->middleware('guest')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
 
        $request->session()->flush();
 
        $request->session()->regenerate();
 
        return redirect()->route('login')->with('success_message', 'you have successfully logged out. See you later!');
    }
}

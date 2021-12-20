<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth as auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;

    public function __construct()
    {
        if (auth::check() && auth::user()->role_id == "admin") {
            $this->redirectTo = route('admin.home');
        } else if (auth::check() && auth::user()->role_id == "user") {
            $this->redirectTo = route('user.home');
        } 

        $this->middleware('guest')->except('logout');
    }
}

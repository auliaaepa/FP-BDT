<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index () {
        $user = Auth::user();
        return view('profile/index', compact('user'));
    }

    public function edit () {
        $user = Auth::user();
        return view('profile/edit', compact('user'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        
        $user = User::firstWhere('email', Auth::user()->email)->update([
            'name' => $request->name, 
            'email' => $request->email,
        ]);

        if ($user) {
            return redirect()->route('indexProfile')->with('success_message', 'Your profile has been changed successfully.');
        } else {
            return redirect()->route('indexProfile')->with('failed_message', 'Your profile failed to change.');
        }
    }

    public function changePassword () {
        return view('profile/changePassword');
    }

    public function savePassword (Request $request) {
        $this->validate($request, [
            'current_password' => ['required', 'string', 'min:8', 'current_password'],
            'new_password' => ['required', 'string', 'min:8'],
            'confirm_new_password' => ['required', 'string', 'min:8', 'same:new_password'],
        ]);

        $user = User::firstWhere('email', Auth::user()->email)->update([
            'password' => Hash::make($request->new_password),
        ]);

        if ($user) {
            return redirect()->back()->with('success_message', 'Your password has been changed successfully.');
        } else {
            return redirect()->back()->with('failed_message', 'Your password failed to change.');
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{   
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

       
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Signup successful! You can now log in.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->email === 'shahirayp@gmail.com') {
                return redirect()->route('adminpage');
            } else {
                return redirect()->route('index');
            }
        }

        return redirect()->route('login')->with('login_error', 'Invalid email or password.')->with('showAlert', 'loginError');
    }

    public function showUsers()
    {
        $users = User::orderBy('id', 'DESC')->get();

        return view('adminpage', ['users' => $users]);
    }
}
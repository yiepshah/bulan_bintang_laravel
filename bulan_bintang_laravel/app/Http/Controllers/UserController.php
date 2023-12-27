<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Post;

class UserController extends Controller  
{   

    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    
      
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'user', 
        ]);


        auth()->login($user);


        return redirect()->route('login')->with('success', 'Signup successful!');
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

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function profile()
    {
        $users = Auth::user();   
        return view('profile', ['user' => $users]);
    }

    public function updateUser(Request $request, $id)
    {
       
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->role = $request->input('role');  
        $users->save();

        return response()->json(['success' => true]);
    }



    public function deleteItem($id)
    {
        
        $users = Post::find($id);
        $users->delete();

       
        return response()->json(['success' => true]);
    }
    
    
    

}
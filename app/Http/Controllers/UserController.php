<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
                return redirect()->route('collection');
            }
        }

        session(['cart' => []]);

        return redirect('/login')->with('showAlert', 'signupSuccess');
    } 


    public function editUser($id){
        $users = User::where('id', '=',$id)->first();
        return view('admin_user_edit' , compact('users'));
    }

    public function updateUser(Request $request){
        // dd($request->all());
            $request->validate([
            'id'=>'required',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $users = $request->id;
        $name = $request->name;
        $email = $request->email;
        $role = $request->role;

        User:: where ('id', '=',$users)->update([
            'name'=>$name,
            'email'=>$email,
            'role'=>$role,

        ]);
        return redirect('adminpage')->with('success', 'User Updated Successfully');
    } 

    public function updateProfile(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required',
            'email' => 'required|email',
        ]);
    
        $user = User::find($request->id);
    
        if ($request->hasFile('image_path')) {
        
            if ($user->image_path) {
                Storage::disk('public')->delete($user->image_path);
            }
    
          
            $imagePath = $request->file('image_path')->storeAs('images', $request->file('image_path')->getClientOriginalName(), 'public');        
            $user->image_path = $imagePath;
        }
    
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
    
    

    public function deleteUser($users){
        User:: where ('id', '=',$users)->delete();
        return redirect()->back()->with('warning', 'User Deleted Successfully');
    }


    public function logout(){
        auth()->logout();

        session(['cart' => []]);
        return redirect('/');
    }

    public function profile()
    {
        $users = Auth::user();   
        return view('profile', ['user' => $users]);
    }

    public function updateAdminProfile(Request $request)
    {
        $request->validate([
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,user',
        ]);
    
        $user = Auth::user();
    
        if (!($user instanceof User)) {
            dd($user);
           
        }
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->role = $request->input('role');
    
    
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $user->image_path = $imageName;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    
 

}
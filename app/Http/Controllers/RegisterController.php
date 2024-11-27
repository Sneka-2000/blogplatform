<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registeruser(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
         'role' => 'required|in:admin,author,visitor',
       
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            
                ]);
        

        Auth::login($user);
    
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'author') {
            return redirect()->route('author.dashboard');
        } else {
            return redirect('/'); 
        }
    }

    public function dashboard()
    {
             return view('admin.dashboard');
    }

    public function login(){
        return view('auth.login');
    }
    public function loginuser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'Invalid email or password');
            }
    
            if ($user->status === 0) {
                return redirect()->back()->with('error', 'Your account is disabled. Please contact the administrator.');
            }
    
            Auth::login($user);
    
            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); 
            } elseif ($user->role === 'author') {
                return redirect()->route('author.dashboard'); 
            } elseif ($user->role === 'visitor') {
                return redirect('/'); 
            }
        }
    
        return redirect()->back()->with('error', 'Invalid email or password');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'logged out successfully!');
    }
    
}

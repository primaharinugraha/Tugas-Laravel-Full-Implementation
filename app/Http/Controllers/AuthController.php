<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function profileuser($id) {
        $user = User::findOrFail($id);

        return view('dashboard.users.profileuser', compact('user'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:superadmin,user',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer',
            'birth' => 'required|date',
            'address' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('dashboard.users.add')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'birth' => $request->birth,
            'address' => $request->address,
        ]);

        $user->assignRole($request->role);

        if ($user) {
            Auth::login($user);
            return redirect()->route('login')->with('success', 'Register success');
        } else {
            return redirect()->route('register')->with('error', 'Register failed');
        }
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('profile.users', [ Auth::user()->id])->with('success', 'Login success');
        } else {
            return redirect()->route('login')->with('error', 'Login failed email or password is incorrect');
        }
    }
    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleCallback()
    {
        
            $user = Socialite::driver('google')->user();
            $exitinguser = User::where('email', $user->email)->first();

            if ($exitinguser) {
                Auth::login($exitinguser);
            } else {
                $newuser =  new User();
                $newuser->google_id = $user->id;
                $newuser->name = $user->name;
                $newuser->email = $user->email;
                $newuser->password = Hash::make(Str::random(15));
                $newuser->gender = 'male';
                $newuser->age = 20;
                $newuser->birth = '2003-18-10';
                $newuser->address = 'jakarta';
                $newuser->save();
                   

                Auth::login($newuser);
            }

            return redirect()->route('profile.users', [ Auth::user()->id])->with('success', 'Login sukses');
      
    }

    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
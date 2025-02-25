<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $countries = country::all();
        return view('admin/user/add-admin-user', compact('countries'));
    }

    public function storeUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:20|string',
            'user_name' => 'required|min:3|max:12|string|different:first_name|nullable',
            'email' => 'required|email|unique:users,email',
            'contact' => 'numeric|nullable',
            'password' => 'required|min:6',
            'address' => 'string|nullable',
            'country' => 'required|exists:tbl_countries,id',
            'profile' => 'required|image|mimes:jpg,jpeg,png',

        ]);

        $requireData = $request->except(['_token']);

        $imageName = 'lv_' . rand() . '.' . $request->profile->extension();
        $request->profile->move(public_path('profiles/'), $imageName);
        $requireData['profile'] = $imageName;

        $requireData['password'] = Hash::make($request->password);

        $user = User::create($requireData);

        event(new WelcomeEmail($user));

        return redirect()->away('/admin/admin-user')->with('success', 'User inserted successfully');
    }

    public function login()
    {
        return view('admin/login');
    }

    // public function authenticate(Request $request)
    // {
    //     $this->validate($request,[
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $credencials = $request->only(['email','password']);

    //     if (Auth::attempt($credencials)) { print_r($credencials);exit;
    //         $user = auth()->user();
    //         return redirect()->intended('/admin/dashboard')->with('success','Logged in successfully!!');
    //     }else{
    //         return redirect()->intended('admin/login')->with('warning','Please try again!!');
    //     }
    //     // echo "<pre>";
    //     // print_r($request->all());exit;
    //     return view('admin/login');
    // }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = auth()->user();
            return redirect()->intended('/admin/dashboard')->with('success', 'Logged in successfully!!');
        } else {
            // Authentication failed
            return redirect()->route('admin')->with('warning', 'Invalid credentials. Please try again.');
        }
    }


    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin')->with('success', 'Logout successfully!!');
    }
}
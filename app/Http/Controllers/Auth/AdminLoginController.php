<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware(['guest', 'guest:admin']);
    }

    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        // Validate form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Attempt to log the user in
        if(Auth::guard('admin')->attempt($credentials)){
            // If successful, then redirect to their profile
            return redirect()->intended(route('admin.profil'));
        }

        // If unsuccessful, redirect back to the login with the form data
        return redirect()->back()->with($request->only('email'));
    }
}
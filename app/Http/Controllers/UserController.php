<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:web');
    }

    public function edit(){
        $user = Auth::user();
        return view('student.edit')->with('user', $user);
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'lname' => 'required|string',
            'program' => 'required',
        ]);
        
        // Update
        $user = Auth::user();
        $user->fname = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->program_id = $request->program;

        $user->save();
        
        return redirect()->route('profil');
    }
}

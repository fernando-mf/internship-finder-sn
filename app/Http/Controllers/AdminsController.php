<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::user();
        //return view('admin.login')->with('user', $user);
        return redirect()->route('index');
        return view('admin.index');
    }

    public function create(Request $request){
        if(!Auth::user()->master){
            return redirect()->route('index');
        }
        return view('admin.create');
    }

    public function store(Request $request){
        if(!Auth::user()->master){
            return redirect()->route('index');
        }
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->master = $request->sudo;
        $admin->save();

        return redirect()->route('index');
    }
}

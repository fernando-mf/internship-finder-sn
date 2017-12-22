<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;

class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:web', ['except' => ['search', 'create']]);
        $this->middleware('auth:web,admin', ['except' => ['search']]);
    }

    public function search($str){
        $company = Company::find($str);
        return $company;
    }

    public function apiIndex(){
        return redirect()->route('index');
    }

    public function index(){
        $companies = Company::orderBy('name', 'asc')->paginate(10);
        return view('companies.index')->with('companies', $companies);
    }

    public function show($id)
    {
        $company = Company::find($id);

        if($company == null){
            return redirect()->route('companies.index');
        }

        $divide = count($company->jobs) > 0 ? 6 : 12;

        return view('companies.show')->with('company', $company)->with('divide', $divide);
    }

    public function create(Request $request){
        return redirect()->route('index');
    }
}

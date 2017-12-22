<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Job;

class JobController extends Controller
{
    public function __construct(){
        // First layer
        $this->middleware('auth:web,admin');
        // Second layer
        $this->middleware('auth:admin', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate(10);
        return view('stage.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('stage.create')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required',
            'website' => 'required|url',
            'phone' => 'nullable|string|min:13',
            'adresse' => 'nullable|string',
            'ville' => 'nullable|string',
            'postal' => 'nullable|string|min:6|max:7',
            'title' => 'required',
            'category' => 'nullable',
            'body_editor' => 'required',
        ]);

        // Check if company update
        $company = null;
        if(!empty($request->up)){
            
            $company = Company::find($request->up);
        } 

        if($company == null){
            // Create company if != exists
            $company = new Company();
        }

        $company->name = $request->company;
        $company->website = $request->website;
        $company->phone = $request->phone;
        $company->address = $request->adresse;
        $company->city = $request->ville;
        $company->postal_code = $request->postal;
        $company->save();

        // Create job offer
        $job = new Job();
        $job->company_id = $company->id;
        $job->jobcategory_id = $request->category;
        $job->title = $request->title;
        $job->description = $request->body_editor;
        $job->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);

        if($job == null){
            return redirect()->route('stages.index');
        }

        return view('stage.show')->with('job',$job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

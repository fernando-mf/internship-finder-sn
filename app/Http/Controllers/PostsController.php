<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Company;
use App\ContactCompany;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('posts.create')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Request
        $this->validate($request, [
            'title' => 'required',
            'body' => 'nullable|string',
            'program' => 'required',
            'company' => 'required',
            'website' => 'required|url',
            'phone' => 'nullable|string|min:13',
            'co_name' => 'nullable|string',
            'co_email' => 'nullable|email',
            'co_phone' => 'nullable|string|min:13',
            'co_ext' => 'nullable|integer'
        ]);

        // Check if company update
        $company = null;
        if(!empty($request->up)){
            $company = Company::find($request->up);
        } 

        if($company == null){
            // Create company if != exists
            $company = new Company();
            $company->name = $request->company;
        }
        
        $company->website = $request->website;
        $company->phone = $request->phone;
        $company->save();

        // Create Post
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->company_id = $company->id;
        $post->program_id = $request->program;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        // Create contact if included
        if(!empty($request->co_name) and (!empty($request->co_email) || !empty($request->co_phone))){
            $contact = new ContactCompany();
            $contact->company_id = $company->id;
            $contact->post_id = $post->id;
            $contact->name = $request->co_name;
            $contact->email = $request->co_email;
            $contact->phone = $request->co_phone;
            $contact->ext_poste = $request->co_ext;
            $contact->save();
        }

        return redirect()->route('profil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if($post == null){
            return redirect()->route('posts.index');
        }

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        // Check for null post
        if($post == null) return redirect()->route('posts.index');
        // Check for correct user
        if(Auth::user()->id != $post->user_id and !Auth::guard('admin')->check()) {
            return redirect()->route('posts.index');
        }

        // Pass existing contact or new model
        if(count($post->inside_contacts) > 0)
            $contact = $post->inside_contacts[0];
        else
            $contact = new ContactCompany();

        return view('posts.edit')->with('post', $post)->with('contact', $contact);

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
        // Validate Request
        $this->validate($request, [
            'title' => 'required',
            'body' => 'nullable|string',
            'program' => 'required',
            'co_name' => 'nullable|string',
            'co_email' => 'nullable|email',
            'co_phone' => 'nullable|string|min:13',
            'co_ext' => 'nullable|integer'
        ]);

        $post = Post::find($id);
        $post->program_id = $request->program;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        // Check if contact has data
        $hasData = (!empty($request->co_name) and (!empty($request->co_email) || !empty($request->co_phone)));

        // Check if contact exist
        if(count($post->inside_contacts) > 0){
            $contact = $post->inside_contacts[0]; 
            // Update
            if($hasData){
                $contact->name = $request->co_name;
                $contact->email = $request->co_email;
                $contact->phone = $request->co_phone;
                $contact->ext_poste = $request->co_ext;
                $contact->save();
            }
            // Delete
            else{
                $contact->delete();
            }
        }     
        else{
            // Create
            if($hasData){
                $contact = new ContactCompany();
                $contact->company_id = $post->company->id;
                $contact->post_id = $post->id;
                $contact->name = $request->co_name;
                $contact->email = $request->co_email;
                $contact->phone = $request->co_phone;
                $contact->ext_poste = $request->co_ext;
                $contact->save();
            }
        }

        return redirect()->route('posts.show', ['id' => $post->id]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Post
        $post = Post::find($id);

        // Get Contact
        $contacts = $post->inside_contacts;

        if(count($contacts) > 0){
            // Each post should only have one contact
            $contact = $contacts[0];
            $contact->delete();
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}

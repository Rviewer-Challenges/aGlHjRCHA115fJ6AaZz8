<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('active', 1)->orderBy("id", 'DESC')->take(6)->get();
        return $projects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->toArray();
        return view('projects.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories_original = Category::all()->toArray();

        if($request['email']){
            $user_exists = User::where('email', $request['email'])->first();

            if($user_exists) {
                return view('projects.create', ['message' => __('views.user_created',), 'status' => 'error', 'categories' => $categories_original]);
            }
        }

        try{

            $user = Auth::user();

            if(!$user){
                $user = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make(rand(100000, 999999))
                ]);
            }

            $new_project = Project::create([
                'user_id' => $user['id'],
                'title' => $request['title'],
                'description' => $request['description'],
                'short_description' => $request['short_description'],
                'motivation' => $request['motivation'],
                'requirements' => $request['requirements'],
                'total_team' => intval( $request['total_team']),
                'active' => 1,
            ]);

            $categories = explode(",", $request['category']);
            $new_project->categories()->attach($categories);

        }catch(Exception $e){
            return view('projects.create', ['message' => __('views.error_create_project',), 'status' => 'error', 'categories' => $categories_original]);
        }

        return view('projects.create', ['message' => __('views.success_create_project',), 'status' => 'success', 'categories' => $categories_original]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    /**
     * Dispaly the view of all projects
     *
     * @return \Illuminate\Http\Response
     */
    public function all(){

        return view('projects.all');
    }

    public function all_api(){

        $projects = Project::all();
        return $projects;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Mail\CreateProject;
use App\Mail\JoinProjectAdmin;
use App\Mail\JoinProyect;
use App\Mail\Welcome;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
                return view('projects.create', ['message' => __('views.user_created',), 'status' => 'error', 'categories' => $categories_original, 'loading' => 0]);
            }
        }

        try{

            $user = Auth::user();

            if(!$user){

                $password = rand(100000, 999999);

                $user = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($password)
                ]);

                Mail::to($user->email)->send(new Welcome($user->name, $user->email, $password));
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

            Mail::to($user->email)->send(new CreateProject($user->name, $new_project->title));

        }catch(Exception $e){
            return view('projects.create', ['message' => __('views.error_create_project',), 'status' => 'error', 'categories' => $categories_original, 'loading' => 0]);
        }

        return view('projects.create', ['message' => __('views.success_create_project',), 'status' => 'success', 'categories' => $categories_original, 'loading' => 0]);
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
    public function update(Request $request, $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $project = Project::find($id);
       $project->delete();

       return back();
    }

    /**
     * Dispaly the view of all projects
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {

        return view('projects.all');
    }

    public function all_api()
    {

        $projects = Project::all();
        return $projects;
    }

    /**
     * Dispaly the view of join projects
     *
     * @return \Illuminate\Http\Response
     */
    public function join($id)
    {
        return view('projects.join', ['project_id' => $id]);
    }

    /**
     * Send the data to the project manager
     *
     * @return \Illuminate\Http\Response
     */
    public function join_post(Request $request)
    {

        if($request['email']){
            $user_exists = User::where('email', $request['email'])->first();

            if($user_exists) {
                return view('projects.join', ['message' => __('views.user_created'), 'status' => 'error', 'project_id' => $request['project_id'], 'loading' => 0]);
            }
        }

        try{

            $user = Auth::user();

            if(!$user){

                $password = rand(100000, 999999);

                $user = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($password)
                ]);

                Mail::to($user->email)->send(new Welcome($user->name, $user->email, $password));
            }

            $project = Project::find($request['project_id']);
            $project->users()->attach($user->id);

            $manager = User::find($project['user_id']);

            Mail::to($user->email)->send(new JoinProyect($user->name, $project->title, $request['why'], $request['share'], $request['experience']));
            Mail::to($manager->email)->send(new JoinProjectAdmin($manager->name, $project->title, $request['why'], $request['share'], $request['experience'], $user->email));

        }catch(Exception $e){
            return view('projects.join', ['message' => __('views.error_join_project'), 'status' => 'error', 'project_id' => $request['project_id'],'loading' => 0]);
        }

        return view('projects.join', ['message' => __('views.success_join_project'), 'status' => 'success', 'project_id' => $request['project_id'],'loading' => 0]);
    }
}

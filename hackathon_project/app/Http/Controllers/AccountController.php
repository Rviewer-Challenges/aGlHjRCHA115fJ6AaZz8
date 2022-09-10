<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('auth.my_account', ['user_id' => $id]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function my_projects($id)
    {
        $projects =  Project::where('user_id', $id)->get();

        return view('projects.my_projects', ['user_id' => $id, 'projects' => $projects]);
    }

    public function my_registered_proyects($user_id)
    {

        $projects = Project::whereHas('users', function ($query) use($user_id) {
            return $query->where('user_id', $user_id)->where('verified', 1);
        })->where('active', 1)->get();

        return view('projects.my_registered_projects', ['user_id' => $user_id, 'projects' => $projects]);
    }

    public function my_team($id)
    {

        $project = Project::find($id);
        $users = $project->users;

        return view('projects.my_team', ['project_id' => $id, 'users' => $users, 'project' => $project]);
    }

    public function change_verified($id, $status, $project_id){

        $project = Project::find($project_id);
        $user = User::find($id);

        $user->verified = $status;
        $user->save();

        if($status == 1){
            $project->current_team = $project->current_team + 1;
        }else{
            if($project->current_team == 0){
                $project->current_team = 0;
            }else{
                $project->current_team = $project->current_team - 1;
            }
        }

        $project->save();

        return redirect()->back();
    }
}

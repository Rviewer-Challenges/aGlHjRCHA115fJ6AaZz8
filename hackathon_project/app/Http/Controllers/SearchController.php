<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index($category)
    {

        return view('search', ['category' => $category]);
    }

    public function search($category){

        $projects = Project::whereHas('categories', function ($query) use($category) {
            return $query->where('slug', $category);
        })->where('active', 1)->orderBy("id", 'DESC')->get();

        return $projects;
    }

}

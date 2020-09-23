<?php

namespace App\Http\Controllers;
use App\Project;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getList() {
        $project = Project::all();
        return view('backend.project.project',['project'=>$project]);
    }
}

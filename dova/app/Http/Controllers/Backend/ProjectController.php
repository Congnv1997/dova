<?php

namespace App\Http\Controllers\Backend;
use App\Project;
use App\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index(){
        $branch = Branch::all();
        $project = Project::all();
        $ongoing = Project::where('status', 1)->get();
        $complete = Project::where('status', 2)->get();
        $idea = Project::where('status', 0)->get();
        return view('backend.project.project-home',
        [
         'branch'=>$branch,
         'project'=>$project,
         'ongoing'=>$ongoing,
         'complete'=>$complete,
         'idea'=>$idea
        ]);
    }
    public function getList() {
        $branch = Branch::all();
        $project = Project::all();
        return view('backend.project.project',['project'=>$project, 'branch'=>$branch]);
    }

    public function store(Request $request) {
        $validateData = $request->validate(
            [
                'name' => 'required',
                'content' => 'required',
                'time_start' => 'required',
                'deadline' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên dự án',
                'content.required' => 'Bạn chưa nhập nội dung của dự án',
                'time_start.required' => 'Bạn chưa nhập thời gian dự án bắt đầu',
                'deadline.required' => 'Bạn chưa nhập thời gian dự kiến hoàn thành dự án'
            ]

        );
        
        // date_default_timezone_set("Asia/Ho_Chi_Minh");
        $branch = new Branch;
        $project = new Project;
        $project->name = $request->name;
        $project->content = $request->content;
        $project->time_start = $request->time_start;
        $project->deadline = $request->deadline;
        $project->status = $request->status;
        $project->rate = $request->rate;
        $project->branch_id = $request->branch;
        $project->save();


        return redirect('project/listProject');
    }

    public function create(){
        return view('backend.project.project');
    }

    // public function edit($id){
    //     $pr = Project::find(id);
    //     return response()->json([
    //         'error' => false,
    //         'pr' => $pr,
    //     ], 200);
    // }
    // public function update(Request $request, $id) {
    //     if($request->ajax()){
    //         $pr = Project::find($id);
    //         $pr->name = $request->edit_name;
    //         $pr->content = $request->edit_content;
    //         $pr->time_start = $request->edit_time_start;
    //         $pr->deadline = $request->edit_deadline;
    //         $pr->status = $request->edit_status;
    //         $pr->rate = $request->edit_rate;
    //         $pr->branch_id = $request->edit_branch;
    //         $pr->save();
    //     }
    //     return view('backend.project.project');

    // }
        public function ongoingList() {
            $branch = Branch::all();
            $ongoing = Project::where('status', 1)->get();
            return view('backend.project.ongoing-project',compact('ongoing','branch'));
        }

        public function completeList() {
            $branch = Branch::all();
            $complete = Project::where('status', 2)->get();
            return view('backend.project.complete-project',compact('complete','branch'));
        }

        public function ideaList(){
            $branch = Branch::all();
            $idea = Project::where('status', 0)->get();
            return view('backend.project.idea-project', compact('idea', 'branch'));
        }
    
}

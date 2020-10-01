<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AddtaskReaquest;
use App\Http\Requests\EdittaskReaquest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TaskController extends  Controller
{
    public function list()
    {
        $bang = Task::all();

        return view('backend.task.task', ['task' => $bang]);
    }


    public function store(AddtaskReaquest $request)
    {
        if ($request->ajax()) {
            $output = '';

            $id = new Task;
            $id->title = $request->title;
            $id->content = $request->content;
            $id->start = $request->start . " " . $request->time_start . ":" . $request->startdate_minute;
            $id->end = $request->end . " " . $request->time_end . ":" . $request->enddate_minute;
            $id->color = $request->color;
            $id->save();

            // $task = Task::all();
            // if ($task) {

            //     foreach ($task as $cn) {
            //         $output .= '<tr>

            //     <td class="text-center">' . $cn->title . '</td>
            //     <td class="text-center">' . $cn->content . '</td>
            //     <td class="text-center">' . $cn->start . '</td>
            //     <td class="text-center">' . $cn->end . '</td>
            //     <td class="text-center">' . $cn->status . '</td>
            //     <td class="text-center">' . $cn->color . '</td>
            //     <td class="text-center">' . $cn->delete_status . '</td>


            //     </tr>';
            //     }
            // }
            return Response($output);
        }
    }
    public function edit($id)
    {
        $cn = Task::find($id);

        return response()->json([
            'error' => false,
            'cn'  => $cn,
        ], 200);
    }
    public function update(EdittaskReaquest $request, $id)
    {
        if ($request->ajax()) {

            $output = '';

            $id = Task::find($id);
            $id->title = $request->title;
            $id->content = $request->content;
            $id->start = $request->start . " " . $request->time_start . ":" . $request->startdate_minute;
            $id->end = $request->end . " " . $request->time_end . ":" . $request->enddate_minute;
            $id->color = $request->color;
            $id->save();
            $task = Task::all();
            // if ($task) {
            //     $a = "{{url('')}}";
            //     foreach ($task as $cn) {
            //         $output .= '<tr>
            //         <td class="text-center">' . $cn->ten . '</td>
            //         <td class="text-center">' . $cn->machinhanh . '</td>
            //         <td class="text-center">' . $cn->created_at . '</td>
            //         <td class="text-center">
            //                             <a onclick="event.preventDefault();editchinhanh(' . $cn->id . ')" title="Chỉnh sửa" href="#" class="edit open-modal btn btn-primary" data-toggle="modal" value="' . $cn->id . '"><i class="fa fa-pencil"></i></a>
            //                               <a  href="xoachinhanh/' . $cn->id . '" class="btn btn-danger js-xoachinhanh" ><i class="fa fa-trash-o"></i></a>
            //                           </td>
            //         </tr>';
            //     }
            // }
            return Response($output);
        }
    }
}

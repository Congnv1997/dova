<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
Use App\task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TaskController extends  Controller
{
    public function list()
    {
        $bang = task::all();
    if(request()->ajax())
    {
     $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
     $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

     $data = task::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','content','start', 'end']);
     return Response::json($data);
    }
    return view('backend.task.task',['task' => $bang]);
}
public function add(){
    return view('backend.task.task');
}
    
    public function store(Request $request)
    {
        if ($request) {
           
            $rule = [
                'name' => 'required',
                'content' => 'required',
                'start' => 'required',
                'end' => 'required',
                'color' => 'required',
            ];
            $msg = [
                'title.required' => 'Bạn cần nhập tên vào',
                'content.required' => 'Bạn cần nhập ghi chú vào',
                'start.required' => 'Bạn cần nhập thời gian bắt đầu vào',
                'end.required' => 'Bạn cần nhập thời gian kết thúc vào',
                'color.required' => 'Bạn cần nhập màu vào',

            ];
            $validator = Validator::make($request->all(), $rule, $msg);
            if ($validator->fails()) {
                echo '<pre>';
                $dataView['err'] = $validator->errors()->toArray();
                echo '<pre>';
                $request->flash();
                return Redirect::to('/task')->withErrors($validator->errors());
            } else {

                $data = array();

                $data['title'] = $request->name;
                $data['content'] = $request->content;
                $data['start'] = $request->start;
                $data['end'] = $request->end;
                $data['status'] = $request->status;
                $data['color'] = $request->color;
                $data['user_id'] = $request->user_id;
        
               

                DB::table('task')->insert($data);
                Session::put('message', 'thêm thành công');
                return Redirect::to('/task');
            }
            return view('backend.task.task');
        }
        }
    
    
    
    
    
    }

<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TaskController extends  Controller
{
    public function list()
    {
        $query = DB::table('task');
        $query->orderBy('id','asc');
        $bang = $query->get();
        return view('backend.task.list',['list' => $bang]);



    }




}

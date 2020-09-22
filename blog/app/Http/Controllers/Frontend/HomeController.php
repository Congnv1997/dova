<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
 use App\Http\Controllers\Controller;

 class HomeController extends  Controller{

    public function index() {
       
        return view('font-end.home');
            
    //        ->with('slide_all',$slide_all);
    }
    public function list()
    {
        $query = DB::table('users')
        ->join('roles', 'roles.id_role', '=', 'users.id_role')
        ->orderBy('users.id', 'desc');
        $bang = $query->get();
        return view('font-end.home', ['list' => $bang]);



    }
 }
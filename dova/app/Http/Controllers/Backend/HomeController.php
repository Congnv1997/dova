<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function admin($staff_id)
     {   
     
        return view('admin.home', compact('staff_id'));
    }
    
}

<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{   
    public function login()
    {
        return redirect('/login');
    }
    public function getLogin()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {   
        
        $valiDateData = $request->validate(
            [
              'email' => 'required',
              'password'=>'required|max:32',
            ],
            [  
               'email.required'  => 'Bạn chưa nhập email',
               'password.required' => 'Bạn chưa nhập mật khẩu',
               'password.max' => 'Mật khẩu phải có ít hơn 32 kí tự',
            
              
            ]);
     
        if(Auth::attempt(['email' => $request->email , 'password' => $request->password ]))
        {   
            $staff_id = Auth::user()->staff_id;
            return redirect(url("admin/{$staff_id}"));
        }
        else
        {
            return redirect('/login');
        }
    }
}

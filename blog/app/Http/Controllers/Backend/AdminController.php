<?php

namespace App\Http\Controllers\Backend;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login(Request $request)
    {

      $dataview = ['errs'=>[]];
      if($request->isMethod('post')){
          $rule = [
              'admin_email'=>'required|email',
              'admin_password'=>'required|Min:1'
          ];
          $msg = [
               'admin_email.required' => 'bạn cần nhập địa chỉ email',
              'admin_email.required.email' => 'bạn cần nhập đúng định dạng email ',
              'admin_password.required' => 'bạn cần nhập mật khẩu vào',
              'admin_password.required.min' => 'bạn cần nhập tối thiểu 1 kí tự',

          ];


          $validator = Validator::make($request->all(), $rule,$msg);

          if($validator->fails()){
              $dataView['errs'] = $validator->errors()->toArray();
          }else {
              //  login
              $dataLogin = [
                  'email' => $request->get('admin_email'),
                  'password' => $request->get('admin_password')
                
              ];
//              print_r($dataLogin);
//              die();

              if (Auth::attempt($dataLogin)) {
                  echo "OK dang nhap thanh cong, thong tin user: ";
                  echo '<pre>';
                  print_r(Auth::user());
                  echo '</pre>';
                  echo '<br>ID tai khoan = ' . Auth::id();

                       return redirect()->route('User.Index');

              } else {

                  $dataView['errs'][] = 'Sai tên đăng nhập hoặc sai password!';
              }


          }
      }
    return view('backend.Admin.admin_login',$dataview);
    }
    public function Logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('Auth.Login');
    }

}


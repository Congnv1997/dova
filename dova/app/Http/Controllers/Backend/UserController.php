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

class UserController extends  Controller
{
    public function list()
    {
        $query = DB::table('users')
            ->join('roles', 'roles.id_role', '=', 'users.id_role')
            ->orderBy('users.id', 'desc');
        $bang = $query->get();
        return view('backend.user.list', ['list' => $bang]);
    }

    public function add()
    {

        $role_user = DB::table('roles')->orderBy('id_role', 'desc')->get();
        return view('backend.user.add')->with('role_user', $role_user);
    }

    public function save(Request $request)
    {
        if ($request) {
            $rule = [
                'avatar' => 'required|image',
                'email' => 'required|email',
                'password' => 'required',
                'password-1' => 'required|same:password',
                'name' => 'required',
                'phone' => 'required|min:10|max:10'
            ];
            $msg = [
                'avatar.required' => 'Bạn cần nhập ảnh vào',
                'avatar.required.image' => 'Bạn cần nhập đúng file ảnh',
                'email.required' => 'Bạn cần nhập email vào',
                'email.required.email' => 'Bạn cần nhập đúng định dạng email vào',
                'password.required' => 'Bạn cần nhập password vào',
                'password-1.required' => 'Bạn cần nhập lại password',
                'password-1.same' => '2 mật khẩu phải trùng nhau',
                'phone.required' => 'Bạn cần nhập số điện thoại vào',
                'phone.min' => 'bạn cần nhập ít nhất 10 số',
                'phone.max' => 'bạn chỉ được nhập lớn nhất 10 số',
                'name.required' => 'bạn phải điền tên vào',


            ];
            $validator = Validator::make($request->all(), $rule, $msg);

            if ($validator->fails()) {
                echo '<pre>';
                $dataView['err'] = $validator->errors()->toArray();
                echo '<pre>';
                $request->flash();
                return Redirect::to('/addUser')->withErrors($validator->errors());
            } else {
                $data = array();
                $data['email'] = $request->email;
                $data['password'] = Hash::make($request->password);
                $data['name_user'] = $request->name;
                $data['phone'] = $request->phone;
                $data['id_role'] = $request->user_role;
                $get_image = $request->file('avatar');
                if ($get_image) {
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.', $get_name_image));
                    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move('public\upload\user', $new_image);
                    $data['avatar'] = $new_image;
                    DB::table('users')->insert($data);
                    Session::put('message', 'thêm người nhân sự  thành công');
                    return Redirect::to('/listUser');
                }
                $data['avatar'] = '';

                DB::table('users')->insert($data);
                Session::put('message', 'thêm User không thành công');
                return Redirect::to('/addUser');
            }
        }
    }
    public function edit($User_id)
    {
        $role_user = DB::table('roles')->orderBy('id_role', 'desc')->get();
        $edit_user = DB::table('users')->where('id', $User_id)->get();
        $maneger_user = view('backend.user.edit')
            ->with('edit_user', $edit_user)
            ->with('role_user', $role_user);
        return view('layout.fontend_layout')->with('backend.user.edit', $maneger_user);;
    }

    public function update(Request $request, $User_id)
    {
        if ($request) {
            $rule = [
                'avatar' => 'image',
                'email' => 'required|email',
                'password' => 'required',
                'name' => 'required',
                'phone' => 'required|min:10|max:10'
            ];
            $msg = [
                'avatar.required' => 'Bạn cần nhập ảnh vào',
                'avatar.image' => 'Bạn cần nhập đúng file ảnh',
                'email.required' => 'Bạn cần nhập email vào',
                'email.required.email' => 'Bạn cần nhập đúng định dạng email vào',
                'password.required' => 'Bạn cần nhập password vào',
                'phone.required' => 'Bạn cần nhập số điện thoại vào',
                'phone.min' => 'bạn cần nhập ít nhất 10 số',
                'phone.max' => 'bạn chỉ được nhập lớn nhất 10 số',
                'name.required' => 'bạn phải điền tên vào',


            ];
            $validator = Validator::make($request->all(), $rule, $msg);

            if ($validator->fails()) {
                echo '<pre>';
                $dataView['err'] = $validator->errors()->toArray();
                echo '<pre>';
                $request->flash();
                return redirect()->route('user.edit', [$User_id])->withErrors($validator->errors());
            } else {
                $data = array();
                $data['email'] = $request->email;
                $data['password'] = Hash::make($request->password);
                $data['name_user'] = $request->name;
                $data['phone'] = $request->phone;
                $data['id_role'] = $request->user_role;
                $get_image = $request->file('avatar');
                if ($get_image) {
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.', $get_name_image));
                    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move('public\upload\user', $new_image);
                    $data['avatar'] = $new_image;
                    DB::table('users')->where('id', $User_id)->update($data);
                    Session::put('message', 'thay đổi người dùng thành công');
                    return Redirect::to('/listUser');
                }

                DB::table('users')->where('id', $User_id)->update($data);
                Session::put('message', 'thay đổi người dùng thành công');
                return Redirect::to('/listUser');
            }
        }
    }
    public  function delete($User_id)
    {
        DB::table('users')->where('id', $User_id)->delete();
        Session::put('message', 'xóa tài khoản  thành công');
        return  Redirect::to('/listUser');
    }
}

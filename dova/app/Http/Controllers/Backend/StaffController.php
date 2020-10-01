<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AddstaffRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Staff;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function nhansu()
    {
        return view('backend.staff.nhansu-home');
    }
    public function list()
    {
        $bang = Staff::all();

        return view('backend.staff.staff', ['nhansu' => $bang]);
    }
    public function postthemnhansu(AddstaffRequest $request)
    {
        if ($request->ajax()) {

            $output = '';
            if ($request->hasFile('img')) {

                $image = $request->img;
                $image->move(base_path('/public/upload'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            } else {
                $img = 'teacher.png';
            }
            $ns = new Staff;
            $ns->name = $request->name;
            $ns->image = $img;
            $ns->branch = $request->branch;
            $ns->address = $request->address;
            $ns->email = $request->email;
            $ns->gender = $request->sex;
            $ns->phone_number = $request->phone_number;
            $ns->year_of_birth = $request->year_of_birth;
            $ns->academic_level = $request->academic_level;


            $ns->save();



            $nhansu = Staff::all();
            if ($nhansu) {

                $a = "{{url('')}}";
                foreach ($nhansu as $ns) {
                    if ($ns->vitri == 1) {
                        $chucvu = 'Giáo viên';
                    } elseif ($ns->vitri == 2) {
                        $chucvu = 'Tư vấn';
                    } elseif ($ns->vitri == 3) {
                        $chucvu = 'Kế toán';
                    } elseif ($ns->vitri == 4) {
                        $chucvu = 'Quản lý';
                    } else {
                        $chucvu = 'Khác';
                    }
                    $output .= '<tr>
                      <td class="text-center"><img src="' . url("") . '/public/upload/' . $ns->image . '" alt=""  width="80px"></td>
                                   <td class="text-center">' . $ns->name . '</td>
                                   <td class="text-center">' . $ns->phone_number . '</td>
                                   <td class="text-center">' . $ns->branch . '</td>
                                   <td class="text-center">' . $ns->address . '</td>
                                   <td class="text-center">' . $ns->email . '</td>
                                   <td class="text-center">' . $ns->gender . '</td>
                               
                                   <td class="text-center">
                                      ' . $chucvu . '
                                   </td>
                     <td class="text-center">
                                       <a  onclick="event.preventDefault();editnhansu(' . $ns->id . ')" href="#" class="btn btn-primary btn-sm m-r-xs"><i class="fa fa-pencil"></i> Sửa</a>
                                       <a href="http://localhost/alibaba2/public/nhan-su/xoa/' . $ns->id . '" class="btn btn-danger btn-sm js-xoanhansu"><i class="fa fa-times "></i> Xóa</a>
                                   </td>
                    </tr>';
                }
            }



            return Response($output);
        }
    }
}

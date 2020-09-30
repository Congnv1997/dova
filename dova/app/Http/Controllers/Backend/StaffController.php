<?php

namespace App\Http\Controllers\Backend;
use DB;
use Illuminate\Http\Request;
use App\StaffModel;
use App\TimecardModel;
use Illuminate\Support\Facades\Auth;


class StaffController extends Controller
{
    //
    public function home()
    {
        return view('admin.staff.staff_home');
    }
    public function getTimeCard()
    {   
        // $time_card = TimecardModel::all();
        // $tl = TheLoai::findOrFail($id);
        $staff_timecard = DB::table('staff')->join('time_card', 'staff.id', '=', 'time_card.staff_id')->get();
        // $staff = StaffModel::all();
        // $time_card = TimecardModel::paginate(4);
        // $staff = StaffModel::all();
        
        return view('admin.staff.timecard',['staff_timecard'=>$staff_timecard]);
    }
    public function postTimeCard(Request $request)
    {
        $validatedData = $request->validate
        (
              [
                
                'check_in' => 'required',
                'check_out' => 'required'

              ],
              [
                 'check_in.required'=>'Bạn chưa check_in thời gian làm việc!',
                 'check_out.required'=>'Bạn chưa check_out thời gian làm việc!',
                         
              ]);
        
        $day = (date('Y-m-d', strtotime($request->check_day)));
        $check_in = (date('Y-m-d H:i:s', strtotime($request->check_in)));
        $check_out = (date('Y-m-d H:i:s', strtotime($request->check_out)));
        $time_card = new TimecardModel();
        $time_card->staff_id = $request->staff_id;
        $time_card->day = $day;
        $time_card->check_in = $check_in;
        $time_card->check_out = $check_out;
        $time_card->note = "";
        $time_card->save();
        return redirect('staff/timecard');

    }
    public function getEditnote($id)
    {
        $time_card = TimecardModel::find($id);           
        return response()->json(['error' => false, 'tc_id'=>$time_card],200); // 200 là mã lỗi
          
    }
    public function postEditnote(Request $request, $id)
     { 
        $timeCard = TimecardModel::find($id);
        $timeCard->note = $request->input('note');
        $timeCard->update();
        
    }

        
        

    
}

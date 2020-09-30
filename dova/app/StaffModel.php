<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TimecardModel;

class StaffModel extends Model
{
    //
    protected $table = 'staff';
     //Một bộ phận có nhiều nhân viên, lấy ra tất cả nhân viên từ một bộ phận
    //  public function department()
    //  {
    //    return $this->belongsTo('App\Department', 'department_id','id');
    //  }
    //  public function time_card()
    //  {
    //    return $this->hasMany('App\TimecardModel','staff_id','id');
    //  }
    //  protected $table = "tintuc";
    //  public function loaitin()
    //  {
    //    return $this->belongsTo('App\LoaiTin','idLoaiTin','id');
    //  }
    //  public function comment()
    //  {
    //    return $this->hasMany('App\Comment','idTinTuc','id');
    //  }
}

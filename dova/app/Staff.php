<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "staff";

    public function taskStaff() {
        return $this->belongsTo('App\Task_Staff', 'staff_id', 'id');
    }

    public function branch() {
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }

    public function projectStaff() {
        return $this->belongsTo('App\Task_Staff', 'staff_id', 'id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_card extends Model
{
    protected $table = "time_card";

    public function staff() {
        return $this->belongsTo('App\Staff', 'staff_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "task";

    public function taskStaff() {
        return $this->belongsTo('App\Task_Staff','task_id','id');
    }
}

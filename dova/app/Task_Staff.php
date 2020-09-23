<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_Staff extends Model
{
    protected $table = "task_staff";

    public function task() {
        return $this->hasMany('App\Task', 'task_id', 'id');
    }

    public function staff() {
        return $this->hasMany('App\Staff', 'staff_id', 'id');
    }
}

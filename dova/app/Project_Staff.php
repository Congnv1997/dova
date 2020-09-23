<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Staff extends Model
{
    protected $table = "project_staff";

    public function staff() {
        return $this->hasMany('App\Staff', 'staff_id', 'id');
    }
    
    public function project() {
        return $this->hasMany('App\Project', 'project_id', 'id');
    }
}

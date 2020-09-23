<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "project";

    public function projectStaff() {
        return $this->belongsTo('App\Project_Staff', 'project_id', 'id');
    }

    public function department() {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }
}

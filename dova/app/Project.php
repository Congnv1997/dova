<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "project";

    public $timestamps = false;

    public function projectStaff() {
        return $this->belongsTo('App\Project_Staff', 'project_id', 'id');
    }

}

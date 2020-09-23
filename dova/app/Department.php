<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "department";

    public function project(){
        return $this->hasMany('App\Project', 'department_id', 'id');
    }
}

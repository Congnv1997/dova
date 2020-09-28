<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = "branch";

    public $timestamps = false;

    public function staff() {
        return $this->hasMany('App\Staff', 'branch_id', 'id');
    }

    public function project() {
        return $this->hasMany('App\Project', 'branch_id', 'id');
    }
}

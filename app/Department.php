<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "department";

    public $timestamps = false;

    public function staff() {
        return $this->hasMany('App\Staff', 'staff_id', 'id');
    }
}

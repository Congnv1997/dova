<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'id_role';
    protected $table = 'roles';
    protected $fillable =['id_role','name'];

    public function permission(){
        return $this->belongsToMany(Permission::class,'role_pms','id_role','id_pms');
    }
}

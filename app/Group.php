<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['groupNum'];

    // public function student()
    // {
    //     return $this->hasOne('App\Student', 'group_id');
    // }

    public function students()
    {
        return $this->hasMany('App\Student', 'group_id');
    }
}

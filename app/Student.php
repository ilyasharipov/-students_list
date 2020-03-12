<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'lastName', 'patronymic', 'group_id'];

    // public function group()
    // {
    //     return $this->hasOne('App\Group');
    // }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}

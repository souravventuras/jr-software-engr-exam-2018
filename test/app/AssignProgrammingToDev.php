<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignProgrammingToDev extends Model
{
    protected $table = 'assign_programming_to_devs';

     public function developers()
    {
        return $this->belongsTo('App\Developers');
    }
}

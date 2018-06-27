<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developers extends Model
{
    protected $table = 'developers';


      public function assignprogrammingtodevs()
    {
        return $this->hasMany('App\AssignProgrammingToDev');
    }

     public function assignlanguagetodevs()
    {
        return $this->hasMany('App\AssignLanguageToDev');
    }
}

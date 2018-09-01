<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['email'];

    public function language(){
        return $this->belongsToMany('App\Models\Language');
    }

    public function programmingLanguage(){
        return $this->belongsToMany('App\Models\ProgrammingLanguage');
    }
}

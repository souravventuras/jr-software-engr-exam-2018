<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{

    protected $table = 'developers';

    public function programming_languages() {
        return $this->belongsToMany('App\ProgrammingLanguage');
    }

    public function languages() {
        return $this->belongsToMany('App\Language');
    }
}

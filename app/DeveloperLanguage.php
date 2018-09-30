<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperLanguage extends Model
{
    public function developer(){
        return $this->belongsTo('App\Developer');
    }

    public function programmingLanguage(){
        return $this->belongsTo('App\ProgrammingLanguage');
    }
}

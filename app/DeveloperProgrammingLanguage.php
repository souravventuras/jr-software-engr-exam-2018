<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperProgrammingLanguage extends Model
{
    public function developer(){
        return $this->belongsTo('App\Developer');
    }

    public function programmingLanguages(){
        return $this->belongsTo('App\ProgrammingLanguage');
    }

}

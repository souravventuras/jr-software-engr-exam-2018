<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    protected $table = 'programming_languages';

     public function developers()
    {
        return $this->belongsTo('App\Developers');
    }

}

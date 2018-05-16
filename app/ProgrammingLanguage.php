<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    public function developers() {
        return $this->belongsToMany('App\Developer');
    }
}

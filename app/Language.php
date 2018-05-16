<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function developers() {
        return $this->belongsToMany('App\Developer');
    }
}

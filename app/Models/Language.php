<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['code'];

    public function developer(){
        return $this->belongsToMany('App\Models\Developer');
    }


}

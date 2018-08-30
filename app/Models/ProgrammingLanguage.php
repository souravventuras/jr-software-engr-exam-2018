<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    protected $fillable = ['name'];

    public function developer(){
        return $this->belongsToMany('App\Models\Developer');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developers extends Model
{
    protected $table = "developers";
    protected $fillable = [
        'email'
    ];
    public function programming_language(){

        return $this->hasManyThrough('App\Language', 'App\ProgrammingLanguage');
    }
}

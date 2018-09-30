<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    use Searchable;

    public function developers(){
    	
        return $this->hasMany('App\Developer', 'id', 'developer_id');
    }

    public function programmingLanguages(){
    	return $this->hasManyThrough(
            'App\ProgrammingLanguage',
            'App\Developer',
            'id', // Foreign key on developers table...
            'developer_id', // Foreign key on programming_languages table...
            'developer_id', // Local key on languages table...
            'id' // Local key on developers table...
        );
    }
}

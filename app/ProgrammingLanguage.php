<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{

    use Searchable;

    public function developers(){
    	
        return $this->hasMany('App\Developer', 'id', 'developer_id');
    }

    public function languages(){
    	return $this->hasManyThrough(
            'App\Language',
            'App\Developer',
            'id', // Foreign key on developers table...
            'developer_id', // Foreign key on languages table...
            'developer_id', // Local key on programming_languages table...
            'id' // Local key on developers table...
        );
    }
}

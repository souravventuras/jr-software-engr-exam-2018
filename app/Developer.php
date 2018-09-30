<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    public function programmingLanguages(){
    	return $this->hasManyThrough(
            'App\ProgrammingLanguage',
            'App\DeveloperProgrammingLanguage',
            'developer_id', // Foreign key on DeveloperProgrammingLanguage table...
            'id', // Foreign key on ProgrammingLanguage table...
            'id', // Local key on Developer table...
            'programming_language_id' // Local key on DeveloperProgrammingLanguage table...
        );
    }

    public function Languages(){
    	return $this->hasManyThrough(
            'App\Language',
            'App\DeveloperLanguage',
            'developer_id', // Foreign key on DeveloperProgrammingLanguage table...
            'id', // Foreign key on ProgrammingLanguage table...
            'id', // Local key on Developer table...
            'language_id' // Local key on DeveloperLanguage table...
        );
    }

}

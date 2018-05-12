<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    protected $table = "programming_languages";
    protected $fillable = [
        'developer_id' , 'name'
    ];
}

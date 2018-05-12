<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "languages";
    protected $fillable = [
        'programming_language_id' , 'code'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperLanguage extends Model
{
    protected  $table = "developer_languages";
    protected $fillable = ['developer_id', 'language_id'];
}

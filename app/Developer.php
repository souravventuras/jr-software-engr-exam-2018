<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DevProLangMapping;
use ProgrammingLanguage;


class Developer extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = "developers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email'
    ];

    /**
     * Getting programming Has Many Through
     *
     * @return void
     */
    public function programming(){

        return $this->hasManyThrough(
            'App\ProgrammingLanguage',
            'App\DevProLangMapping',
            'developer_id',
            'id',
            'id',
            'programming_language_id'
        );
    }

    /**
     * Getting language using Has Many Through
     *
     * @return void
     */
    public function language(){

        return $this->hasManyThrough(
            'App\Language',
            'App\LanguageMapping',
            'developer_id',
            'id',
            'id',
            'language_id'
        );
    }




}

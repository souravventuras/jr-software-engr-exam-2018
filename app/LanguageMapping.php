<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageMapping extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = "dev_lang_mapping";

    /**
     * Make timestamp disable
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'developer_id',
        'language_id'
    ];
}

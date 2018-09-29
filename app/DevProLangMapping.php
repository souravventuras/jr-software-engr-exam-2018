<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevProLangMapping extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = "dev_pro_lang_mapping";

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
        'programming_language_id'
    ];

}

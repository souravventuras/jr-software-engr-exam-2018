<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programming_language extends Model
{
    protected $fillable = ['name'];

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'developer_programming_languages', 'pro_lang_id', 'developer_id');
    }
}

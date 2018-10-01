<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['code'];

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'developer_languages', 'language_id', 'developer_id');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code'];

    /**
     * The developers that belong to the language.
     */
    public function developers()
    {
        return $this->belongsToMany(Developer::class);
    }
}

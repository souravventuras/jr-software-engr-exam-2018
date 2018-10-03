<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The developers that belong to the programming language.
     */
    public function developers()
    {
        return $this->belongsToMany(Developer::class);
    }
}

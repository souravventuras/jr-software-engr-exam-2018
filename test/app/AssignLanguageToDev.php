<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignLanguageToDev extends Model
{
    protected $table = 'assign_language_to_devs';

     public function developers()
    {
        return $this->belongsTo('App\Developers');
    }

}

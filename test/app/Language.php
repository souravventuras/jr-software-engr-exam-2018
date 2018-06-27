<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

     public function developers()
    {
        return $this->belongsTo('App\Developers');
    }
}

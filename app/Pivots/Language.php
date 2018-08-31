<?php
/**
 * Created by PhpStorm.
 * User: kamol
 * Date: 8/30/2018
 * Time: 10:06 AM
 */

namespace App\Pivots;


use Illuminate\Database\Eloquent\Relations\Pivot;

class Language extends Pivot
{

    public function language(){
        return $this->hasManyThrough('App\Models\Language', 'App\Models\Developer');
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: kamol
 * Date: 8/28/2018
 * Time: 3:01 PM
 */

namespace SimpleSearch\Repository;


use SimpleSearch\Repository\Eloquent\Repository;

class LanguageRepository extends Repository
{

    public function model()
    {
        return 'App\Models\Language';
    }
}
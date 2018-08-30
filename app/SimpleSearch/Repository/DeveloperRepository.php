<?php
/**
 * Created by PhpStorm.
 * User: kamol
 * Date: 8/28/2018
 * Time: 5:39 PM
 */

namespace SimpleSearch\Repository;


use SimpleSearch\Repository\Eloquent\Repository;

class DeveloperRepository extends Repository
{

    public function model()
    {
        return 'App\Models\Developer';
    }
}
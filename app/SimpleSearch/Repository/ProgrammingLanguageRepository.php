<?php
/**
 * Created by PhpStorm.
 * User: kamol
 * Date: 8/28/2018
 * Time: 5:40 PM
 */

namespace SimpleSearch\Repository;


use SimpleSearch\Repository\Eloquent\Repository;

class ProgrammingLanguageRepository extends Repository
{

    public function model()
    {
        return 'App\Models\ProgrammingLanguage';
    }

    public function getAll($columns = array('*'))
    {
        return $this->model->with('developer')->get();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: kamol
 * Date: 8/28/2018
 * Time: 1:56 PM
 */

namespace SimpleSearch\Repository\Contacts;


interface RepositoryInterface
{
    public function getAll($columns = array('*'));

    public function find($id);

    public function create(array $data);

}
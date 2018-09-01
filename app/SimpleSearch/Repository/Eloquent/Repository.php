<?php
/**
 * Created by PhpStorm.
 * User: kamol
 * Date: 8/28/2018
 * Time: 1:59 PM
 */

namespace SimpleSearch\Repository\Eloquent;


use SimpleSearch\Repository\Contacts\RepositoryInterface;
use SimpleSearch\Repository\Exceptions\RepositoryExceptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class Repository implements RepositoryInterface
{

    private $app;

    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;

        $this->makeModel();
    }

    public abstract function model();

    public function makeModel(){
       return $this->setModel($this->model());
    }

    public function setModel($eloquentModel){
         $model = $this->app->make($eloquentModel);

         if(!$model instanceof Model){
             throw new RepositoryExceptions("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
         }

         return $this->model = $model;
    }

    public function getAll($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

}
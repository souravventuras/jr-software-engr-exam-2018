<?php

namespace Developers\Controller;

use Developers\Controller\AppController;

class Developers extends AppController{

    public function initialize() {
        parent::initialize();
        $this->Auth->allow();
    }

    public function index() {

    }

}

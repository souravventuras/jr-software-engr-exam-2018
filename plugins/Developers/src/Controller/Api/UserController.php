<?php

namespace Leaping\Controller\Api;


use Firebase\JWT\JWT;
use Leaping\Controller\Api\AppController;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\ORM\TableRegistry;

class UserController extends AppController
{
    public $user_id = 15;

    public function initialize()
    {
        parent::initialize();
        $this->RequestHandler->ext = 'json';
    }

    public function login()
    {
        $this->add_model(array('Leaping.Users'));

        if (!empty($this->request->data)) {
            $data = $this->request->data;
            $type = 'login';
            $response = $this->Users->user(0,$data,$type);
        }
        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;

    }
}

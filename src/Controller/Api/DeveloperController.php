<?php
namespace App\Controller\Api;

use App\Controller\AppController;

class DeveloperController extends AppController
{


    public function index()
    {
        $data = $this->request;
        $header = $data->header('Content-Type');

        $this->viewBuilder()->autoLayout(false);
        $this->autoRender = false;

        $this->loadModel('Developers');
        $this->loadModel('Languages');
        $this->loadModel('ProgrammingLanguages');


        $this->paginate = [
            'contain' => ['Languages', 'ProgrammingLanguages'],
            'limit' => 10
        ];

        $developers_data = $this->paginate($this->Developers);

        if (!empty($developers_data)) {
            $developers = $this->Developers->formatDeveloperData($developers_data);
        } else {
            $developers = [];
        }

        if ($header == 'application/json') {
            $responseResult = json_encode($developers);
            $this->response->type('json');
            $this->response->body($responseResult);
            return $this->response;
        } else {
            return null;
        }
    }


}

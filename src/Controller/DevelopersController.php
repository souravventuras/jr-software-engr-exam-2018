<?php
namespace App\Controller;

use App\Controller\AppController;

class DevelopersController extends AppController
{

    public $paginate = [
        'limit' => 10,
        'order' => [
            'Developers.id' => 'asc'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Languages');
        $this->loadModel('ProgrammingLanguages');
        $language_conditions = [];
        $prog_language_conditions = [];
        $search = false;
        $options = $this->request->data;
        $this->Session = $this->request->session();
        if (!empty($options['reset']) && ($options['reset'] == 'reset')) { // Reset list
            $this->Session->delete('Developers.search');
            $this->request->data = $options = array();
        }
        if (!empty($options['search']) && ($options['search'] == 'submit')) { // searc submit and & set session params
            $this->Session->write('Developers.search', $options);
            $search = true;
        }
        if (!empty($options['languages'])) {
            $language_conditions =['Languages.code' =>$options['languages']];
        }
        if (!empty($options['programming_languages'])) {
            $prog_language_conditions = ['ProgrammingLanguages.name' =>$options['programming_languages']];
        }
        $query = $this->Developers->find()
            ->contain(['Languages', 'ProgrammingLanguages']);
        if (!empty($language_conditions)) {

            $query->matching('Languages', function ($q) use ($language_conditions) {
                return $q->where($language_conditions);
            });
        }
        if (!empty($prog_language_conditions)) {
            $query->matching('ProgrammingLanguages', function ($q) use ($prog_language_conditions) {
                return $q->where($prog_language_conditions);
            });
        }
        $query->order(['Developers.created' => 'DESC']);

        $developers_data = $this->paginate($query)->toArray();
        if(!empty($developers_data)){
            $developers = $this->Developers->formatDeveloperData($developers_data);
        } else {
            $developers = [];
        }
        $this->set(compact('developers'));
        $this->set('search', $search);
    }
}

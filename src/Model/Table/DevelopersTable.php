<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class DevelopersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('developers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');


        $this->belongsToMany('Languages', ['joinTable' => 'developer_languages',
            'foreignKey' =>'developer_id','bindingKey' => 'id']);
        $this->belongsToMany('ProgrammingLanguages', ['joinTable' => 'developer_programming_languages',
            'foreignKey' =>'developer_id','bindingKey' => 'id']);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function formatDeveloperData($developers){

        $developer_data = [];
        foreach($developers as $developer){
            $programming_languages = [];
            $languages = [];
            foreach ($developer['programming_languages'] as $dev_prog_lang){
                $programming_languages[] = $dev_prog_lang['name'];
            }
            foreach ($developer['languages'] as $dev_lang){
                $languages[] = $dev_lang['code'];
            }
            $developer_data[] = ['email' => $developer['email'], 'languages' => $languages, 'programming_languages' => $programming_languages];
        }
        return $developer_data;
    }
}

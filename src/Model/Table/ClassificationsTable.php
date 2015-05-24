<?php
namespace App\Model\Table;

use App\Model\Entity\Classification;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classifications Model
 */
class ClassificationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('classifications');
        $this->displayField('idclassification');
        $this->primaryKey('idclassification');
        $this->hasMany('Activities', [
            'foreignKey' => 'classification_id'
        ]);
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
            ->add('idclassification', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('idclassification', 'create')
            ->requirePresence('classification_name', 'create')
            ->notEmpty('classification_name');

        return $validator;
    }
}

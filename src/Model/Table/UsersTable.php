<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('iduser');
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('iduser', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('iduser', 'create')
                ->requirePresence('name', 'create')
                ->notEmpty('name')
                ->add('email', 'valid', ['rule' => 'email'])
                ->requirePresence('email', 'create')
                ->notEmpty('email')
                ->requirePresence('login', 'create')
                ->notEmpty('login')
                ->requirePresence('password', 'create')
                ->notEmpty('password')
                ->add('type', 'valid', ['rule' => 'numeric'])
                ->requirePresence('type', 'create')
                ->notEmpty('type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['login']));
        $rules->add($rules->existsIn(['course_id'], 'Courses'));
        return $rules;
    }

}

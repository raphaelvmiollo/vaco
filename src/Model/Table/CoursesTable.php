<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

/**
 * Courses Model
 */
class CoursesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('courses');
        $this->displayField('idcourse');
        $this->primaryKey('idcourse');
        $this->hasMany('Users', [
            'foreignKey' => 'course_id'
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
                ->add('idcourse', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('idcourse', 'create')
                ->requirePresence('course_code', 'create')
                ->notEmpty('course_code')
                ->requirePresence('course_name', 'create')
                ->notEmpty('course_name');

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
        $rules->add($rules->isUnique(['course_code']));
        return $rules;
    }

}

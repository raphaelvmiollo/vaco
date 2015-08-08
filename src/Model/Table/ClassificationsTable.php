<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classifications Model
 */
class ClassificationsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('classifications');
        $this->displayField('idclassification');
        $this->primaryKey('idclassification');
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
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
    public function validationDefault(Validator $validator) {
        $validator
                ->add('idclassification', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('idclassification', 'create')
                ->requirePresence('classification_name', 'create')
                ->notEmpty('classification_name')
                ->requirePresence('description', 'create')
                ->notEmpty('description')
                ->add('avaliator_type', 'valid', ['rule' => 'numeric'])
                ->requirePresence('avaliator_type', 'create')
                ->notEmpty('avaliator_type')
                ->add('max_hours', 'valid', ['rule' => 'numeric'])
                ->requirePresence('max_hours', 'create')
                ->notEmpty('max_hours');

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
        $rules->add($rules->existsIn(['course_id'], 'Courses'));
        return $rules;
    }

}

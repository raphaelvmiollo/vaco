<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Activities Model
 */
class ActivitiesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('activities');
        $this->displayField('idactivity');
        $this->primaryKey('idactivity');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Classifications', [
            'foreignKey' => 'classification_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Avaliations', [
            'foreignKey' => 'avaliation_id',
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
                ->add('idactivity', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('idactivity', 'create')
                ->requirePresence('activity_local', 'create')
                ->notEmpty('activity_local')
                ->requirePresence('activity_hours', 'create')
                ->notEmpty('activity_hours')
                ->requirePresence('semester', 'create')
                ->notEmpty('semester')
                ->requirePresence('abstract', 'create')
                ->notEmpty('abstract')
                ->add('date', 'valid', ['rule' => 'date'])
                ->requirePresence('date', 'create')
                ->notEmpty('date')
                ->add('submition_date', 'valid', ['rule' => 'date'])
                ->requirePresence('submition_date', 'create')
                ->notEmpty('submition_date')
                ->requirePresence('path', 'create')
                ->notEmpty('path')
                ->add('user_id', 'valid', ['rule' => 'numeric'])
                ->requirePresence('user_id', 'create')
                ->notEmpty('user_id');

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
        $rules->add($rules->existsIn(['classification_id'], 'Classifications'));
        $rules->add($rules->existsIn(['avaliation_id'], 'Avaliations'));
        return $rules;
    }
}

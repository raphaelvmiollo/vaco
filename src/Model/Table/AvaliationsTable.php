<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avaliations Model
 */
class AvaliationsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('avaliations');
        $this->displayField('idavaliation');
        $this->primaryKey('idavaliation');
        $this->hasOne('Activities', [
            'foreignKey' => 'avaliation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'avaliator_id',
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
                ->add('idavaliation', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('idavaliation', 'create')
                ->add('situation', 'valid', ['rule' => 'numeric'])
                ->requirePresence('situation', 'create')
                ->notEmpty('situation')
                ->allowEmpty('observation')
                ->add('date', 'valid', ['rule' => 'date'])
                ->allowEmpty('date')
                ->add('avaliator_id', 'valid', ['rule' => 'numeric'])
                ->requirePresence('avaliator_id', 'create')
                ->notEmpty('avaliator_id');
        return $validator;
    }

}

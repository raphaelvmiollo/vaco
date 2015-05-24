<?php
namespace App\Model\Table;

use App\Model\Entity\Avaliation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avaliations Model
 */
class AvaliationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('avaliations');
        $this->displayField('idavalation');
        $this->primaryKey('idavalation');
        $this->hasMany('Activities', [
            'foreignKey' => 'avaliation_id'
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
            ->add('idavalation', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('idavalation', 'create')
            ->add('situation', 'valid', ['rule' => 'numeric'])
            ->requirePresence('situation', 'create')
            ->notEmpty('situation')
            ->allowEmpty('observation')
            ->add('date', 'valid', ['rule' => 'date'])
            ->allowEmpty('date');

        return $validator;
    }
}

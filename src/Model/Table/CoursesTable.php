<?php
namespace App\Model\Table;

use App\Model\Entity\Course;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 */
class CoursesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
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
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('idcourse', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('idcourse', 'create')
            ->requirePresence('course_name', 'create')
            ->notEmpty('course_name');

        return $validator;
    }
}

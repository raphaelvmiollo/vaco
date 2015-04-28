<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'login' => true,
        'password' => true,
        'type' => true,
        'course_id' => true,
        'course' => true,
    ];

    protected function _setPassword($value) {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

}

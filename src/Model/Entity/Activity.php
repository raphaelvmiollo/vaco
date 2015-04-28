<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity.
 */
class Activity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'activity_local' => true,
        'activity_hours' => true,
        'semester' => true,
        'abstract' => true,
        'date' => true,
        'path' => true,
        'users_iduser' => true,
        'classification_id' => true,
        'avaliation_id' => true,
        'classification' => true,
        'avaliation' => true,
    ];
}

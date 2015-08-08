<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Classification Entity.
 */
class Classification extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'classification_name' => true,
        'description' => true,
        'avaliator_type'=> true,
        'max_hours' => true,
        'course_id' => true,
        'course' => true,
        'activities' => true,
    ];
}

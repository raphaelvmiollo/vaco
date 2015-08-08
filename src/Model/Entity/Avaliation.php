<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Avaliation Entity.
 */
class Avaliation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'situation' => true,
        'observation' => true,
        'date' => true,
        'avaliator_id' => true,
        'activities' => true,
    ];
}

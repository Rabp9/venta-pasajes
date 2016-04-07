<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetalleConductore Entity.
 *
 * @property int $id
 * @property int $programacion_id
 * @property \App\Model\Entity\Programacione $programacione
 * @property int $conductor_id
 * @property \App\Model\Entity\Conductore $conductore
 * @property string $condicion
 */
class DetalleConductore extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'programacion_id' => false,
        'conductor_id' => false,
    ];
}

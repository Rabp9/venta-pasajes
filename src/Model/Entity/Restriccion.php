<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Restriccione Entity.
 *
 * @property int $id
 * @property int $desplazamiento_x
 * @property \App\Model\Entity\DetalleDesplazamiento $Desplazamiento_x
 * @property int $desplazamiento_y
 * @property \App\Model\Entity\DetalleDesplazamiento $Desplazamiento_y
 * @property string $valor
 */
class Restriccion extends Entity
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
        'id' => false
    ];
}

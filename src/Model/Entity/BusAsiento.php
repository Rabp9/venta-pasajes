<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BusAsiento Entity.
 *
 * @property int $id
 * @property int $bus_piso_id
 * @property \App\Model\Entity\BusPiso $bus_piso
 * @property int $nro_asiento
 * @property int $x
 * @property int $y
 * @property int $estado_id
 * @property \App\Model\Entity\Estado $estado
 */
class BusAsiento extends Entity
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

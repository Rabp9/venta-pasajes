<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tarifa Entity.
 *
 * @property int $id 
 * @property int $servicio_id
 * @property \App\Model\Entity\Servicio $Servicio
 * @property int $origen
 * @property \App\Model\Entity\Agencia $AgenciaOrigen
 * @property int $destino
 * @property \App\Model\Entity\Agencia $AgenciaDestino
 * @property float $precio_min
 * @property float $precio_max
 * @property int $tiempo
 */
class Tarifa extends Entity
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

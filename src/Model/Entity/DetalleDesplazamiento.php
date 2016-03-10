<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetalleDesplazamiento Entity.
 *
 * @property int $id
 * @property int $ruta_id
 * @property \App\Model\Entity\Ruta $ruta
 * @property int $programacion_viaje_id
 * @property \App\Model\Entity\ProgramacionViaje $programacion_viaje
 * @property int $agencia_id
 * @property \App\Model\Entity\Agencia $agencia
 * @property \Cake\I18n\Time $hora_salida
 * @property \Cake\I18n\Time $hora_llegada
 */
class DetalleDesplazamiento extends Entity
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
        'ruta_id' => false,
        'programacion_viaje_id' => false,
        'agencia_id' => false,
    ];
}

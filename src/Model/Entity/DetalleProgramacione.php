<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetalleProgramacione Entity.
 *
 * @property int $id
 * @property int $ruta_id
 * @property \App\Model\Entity\Ruta $ruta
 * @property int $programacion_id
 * @property \App\Model\Entity\Programacione $programacione
 * @property int $servicio_id
 * @property \App\Model\Entity\Servicio $servicio
 */
class DetalleProgramacione extends Entity
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
        'programacion_id' => false,
        'servicio_id' => false,
    ];
}

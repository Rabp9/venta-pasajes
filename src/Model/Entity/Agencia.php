<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agencia Entity.
 *
 * @property int $cod_agencia
 * @property int $ubigeo_id
 * @property \App\Model\Entity\Ubigeo $ubigeo
 * @property string $direccion
 * @property string $telefono
 * @property int $celular
 */
class Agencia extends Entity
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
        'cod_agencia' => false,
        'ubigeo_id' => false,
    ];
}

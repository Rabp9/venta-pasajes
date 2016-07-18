<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EncomiendasTipo Entity.
 *
 * @property \App\Model\Entity\TipoProducto $tipoProducto
 * @property \App\Model\Entity\Encomienda $encomienda
 * @property int $cantidad
 * @property string $detalle
 * @property \App\Model\Entity\Estado $estado
 */
class EncomiendasTipo extends Entity
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


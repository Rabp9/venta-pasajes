<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ubigeo Entity.
 *
 * @property int $id
 * @property string $parent_id
 * @property \App\Model\Entity\ParentUbigeo $parent_ubigeo
 * @property string $lft
 * @property string $rght
 * @property string $descripcion
 * @property string $categoria
 * @property \App\Model\Entity\Agencia[] $agencias
 * @property \App\Model\Entity\ChildUbigeo[] $child_ubigeos
 */
class Ubigeo extends Entity
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
    ];
}

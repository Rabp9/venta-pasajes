<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity.
 *
 * @property int $id
 * @property string $dni
 * @property string $nombres
 * @property string $apellidos
 * @property string $domicilio
 * @property \Cake\I18n\Time $fecha_nac
 * @property string $sexo
 * @property string $telefono
 * @property string $cel
 * @property string $correo
 */
class Persona extends Entity
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

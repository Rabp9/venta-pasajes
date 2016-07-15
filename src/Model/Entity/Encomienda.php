<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Encomienda Entity.
 *
 * @property \App\Model\Entity\Programacion $programacion
 * @property \App\Model\Entity\Desplazamiento $desplazamiento
 * @property \App\Model\Entity\Persona $remitente
 * @property \App\Model\Entity\Persona $destinatario
 * @property \Cake\I18n\Time $fechahora
 * @property float $valor
 * @property string $observaciones
 * @property \Cake\I18n\Time $fecha_envio
 * @property \Cake\I18n\Time $fecha_recepcion
 * @property string $tipodoc
 * @property string $ruc
 * @property string $razonsocial
 * @property \App\Model\Entity\Estado $estado
 */
class Encomienda extends Entity
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


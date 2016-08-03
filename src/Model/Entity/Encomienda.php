<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;
/**
 * Encomienda Entity.
 *
 * @property \App\Model\Entity\Programacion $programacion
 * @property \App\Model\Entity\Cliente $cliente
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
 * @property \App\Model\Entity\EncomiendasTipo[] $encomiendas_tipos
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
    
    protected $_virtual = ['descripcion'];
    
    protected function _getDescripcion() {
        $descripcion = [];
        foreach ($this->_properties["encomiendas_tipos"] as $encomienda_tipo) {
            $descripcion[] = $encomienda_tipo->cantidad . 'x ' . $encomienda_tipo->tipo_producto->descripcion . ' (' . $encomienda_tipo->detalle . ')';
        }
        return substr(Text::toList($descripcion, 'y'), 0, 55);
    }
}


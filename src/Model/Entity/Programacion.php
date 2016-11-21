<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * Programacion Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $fechahora_prog
 * @property \Cake\I18n\Time $fecha_via
 * @property int $bus_id
 * @property \App\Model\Entity\Bus $bus
 * @property int $ruta_id
 * @property \App\Model\Entity\Ruta $ruta
 * @property int $servicio_id
 * @property \App\Model\Entity\Servicio $servicio
 * @property int $estado_id
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\DetalleConductor[] $detalle_conductores
 */
class Programacion extends Entity
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
    
    protected $_virtual = ['piloto', 'copiloto', 'fecha_prog', 'hora_prog'];
    
    protected function _getFechahora_prog($fechahora_prog) {
        if (isset($fechahora_prog)) {
            return $fechahora_prog->format('Y-m-d H:i:s');
        }
        return '';
    }
    
    protected function _getPiloto() {
        if (isset($this->_properties['detalle_conductores'])) {
            $detalleConductores = $this->_properties["detalle_conductores"];
            foreach ($detalleConductores as $detalleConductor) {
                if ($detalleConductor->condicion == 'piloto') {
                    return $detalleConductor;
                }
            }
        }
        return '';
    }
    
    protected function _getCopiloto() {
        if (isset($this->_properties['detalle_conductores'])) {
            $detalleConductores = $this->_properties["detalle_conductores"];
            foreach ($detalleConductores as $detalleConductor) {
                if ($detalleConductor->condicion == 'copiloto') {
                    return $detalleConductor;
                }
            }
        }
        return '';
    }
    
    protected function _getFechaProg() {
        return (new \Cake\I18n\Time($this->_properties['fechahora_prog']))->format('Y-m-d');
    }
    
    protected function _getHoraProg() {
        return (new \Cake\I18n\Time($this->_properties['fechahora_prog']))->format('H:i:s');
    }
}
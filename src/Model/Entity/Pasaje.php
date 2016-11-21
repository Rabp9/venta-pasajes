<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pasaje Entity.
 *
 * @property int $id
 * @property int $persona_id
 * @property \App\Model\Entity\Persona $persona
 * @property int $bus_asiento_id
 * @property \App\Model\Entity\BusAsiento $bus_asiento
 * @property int $programacion_id
 * @property \App\Model\Entity\Programacion $programacion
 * @property int $detalle_desplazamiento_id
 * @property \App\Model\Entity\DetalleDesplazamiento $detalle_desplazamiento
 * @property int $agencia_id
 * @property \App\Model\Entity\Agencia $agencia
 * @property float $valor
 * @property \Cake\I18n\Time $fechahora
 */
class Pasaje extends Entity
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
    
    protected $_virtual = ['cod_boleto', 'valor_formatted'];
    
    protected function _getCodBoleto() {
        return str_pad($this->_properties['id'], 6, '0', STR_PAD_LEFT);
    }
    
    protected function _getValorFormatted() {
        return number_format($this->_properties['valor'], 2, '.', ',');
    }
}

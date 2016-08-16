<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;
/**
 * Encomienda Entity.
 *
 * @property \App\Model\Entity\Programacion $programacion
 * @property \App\Model\Entity\Desplazamiento $desplazamiento
 * @property \App\Model\Entity\Persona $remitente
 * @property \App\Model\Entity\Persona $destinatario
 * @property \Cake\I18n\Time $fecha
 * @property float $valor_total
 * @property string $observaciones
 * @property \Cake\I18n\Time $fecha_envio
 * @property \Cake\I18n\Time $fecha_recepcion
 * @property string $nro_doc
 * @property string $condicion
 * @property \App\Model\Entity\Estado $estado
 */
class Giro extends Entity
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
    
    protected $_virtual = ['documento'];
    
    protected function _getDocumento() {
        return 'Boleta ' . ' 001-' . str_pad($this->_properties['nro_doc'],  6, '0', STR_PAD_LEFT);
    }
}


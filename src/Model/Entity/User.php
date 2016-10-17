<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $estado_id
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\UserDetalles[] $user_detalles
 */
class User extends Entity
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
    
    protected $_virtual = ['datosAgencia'];
      
    protected function _getDatosAgencia() {
        if (isset($this->_properties['user_detalle'])) {
            if (isset($this->_properties['user_detalle']['agencia'])) {
                if (isset($this->_properties['user_detalle']['agencia']['direccion'])) {
                    $agencia = $this->_properties['user_detalle']['agencia']['direccion'];
                    $ciudad = $this->_properties['user_detalle']['agencia']['ubigeo']['descripcion'];
                    return $agencia . ' (' . $ciudad . ')';
                }
            }
        }
        return '';
    }
    
    protected function _setPassword($password) {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
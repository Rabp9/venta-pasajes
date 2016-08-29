<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ruta Entity.
 *
 * @property int $id
 * @property string $descripcion
 * @property int $estado_id
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\DetalleDesplazamiento[] $detalle_desplazamientos
 * @property \App\Model\Entity\DetalleProgramacion[] $detalle_programaciones
 */
class Ruta extends Entity
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
    
    protected $_virtual = ['detalle'];
    
    protected function _getDetalle() {
        if (isset($this->_properties['detalle_desplazamientos'])) {
            $detalle = '';
            $desplazamientos = array();
            $i = 0;
            foreach ($this->_properties['detalle_desplazamientos'] as $detalle_desplazamiento) {
                $des = $detalle_desplazamiento->desplazamiento;
                $desplazamientos[$i] = array(0 => $des->AgenciaOrigen->ubigeo->descripcion, 1 => $des->AgenciaDestino->ubigeo->descripcion);
                $i++;
            }
            $desplazamientos[] = array('Balsas', 'Junin');
            $desplazamientos[] = array('Colcamar', 'Junin');
            $desplazamientos[] = array('Bagua', 'Junin');
            
            $elements = array();
            foreach ($desplazamientos as $desplazamiento) {
                $elements[] = $desplazamiento[0];
                $elements[] = $desplazamiento[1];
            }
            $size = sizeof(array_unique($elements));
            foreach ($desplazamientos as $k_desplazamiento => $desplazamiento) {
                $desplazamientos[$k_desplazamiento] = array_pad($desplazamiento, $size, 0);
            }
            
            for ($i = 0; $i < sizeof($desplazamientos); $i++) {
                for ($j = 0; $j < $size; $j++) {
                    if ($desplazamientos[0][$j]) {
                        for ($m = 1; $m <sizeof($desplazamientos); $m++) {
                            for ($n = 0; $n < $size; $n++) {
                                if ($desplazamientos[$m][$n]) {
                                    if ($desplazamientos[0][$j] == $desplazamientos[$m][$n]) {
                                        if ($n < $j) {
                                            $desplazamientos[$m] = $this->avanzar($desplazamientos[$m], $j, $desplazamientos[0][$j]);
                                        }
                                        if ($n > $j) {
                                            $desplazamientos[0] = $this->avanzar($desplazamientos[0], $n, $desplazamientos[0][$j]);
                                            $j = $n;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $desplazamientos = $this->reordenar($desplazamientos);
            }
            $detalles = array();
            for ($i = 0; $i < $size; $i++) {
                foreach ($desplazamientos as $desplazamiento) {
                    if ($desplazamiento[$i] != "0") {
                        $detalles[$i] = $desplazamiento[$i];
                        break;
                    }
                }
            }
            return implode(' - ', $detalles);
        }
        return '';
    }
    
    private function avanzar($desplazamiento, $indice, $des) {
        $origen = null;
        $destino = null;
        for ($i = 0; $i < sizeof($desplazamiento); $i++) {
            if (is_null($origen) && $desplazamiento[$i] != "0") {
                $origen = $i;
            } elseif ($desplazamiento[$i] != "0") {
                $destino = $i;
            }
        }
        if ($desplazamiento[$origen] == $des) {
            if ($destino > $indice) {
                $desplazamiento[$indice] = $desplazamiento[$origen];
                $desplazamiento[$origen] = 0;
            } else {
                $desplazamiento[$indice + 1] = $desplazamiento[$destino];
                $desplazamiento[$destino] = 0;
                $desplazamiento[$indice] = $desplazamiento[$origen];
                $desplazamiento[$origen] = 0;
            }
        } else {
            $desplazamiento[$indice] = $desplazamiento[$destino];
            $desplazamiento[$destino] = 0;
        }
        return $desplazamiento;
    }
    
    private function reordenar($desplazamientos) {
        $desplazamiento = $desplazamientos[0];
        $desplazamientos = array_slice($desplazamientos, 1);
        array_push($desplazamientos, $desplazamiento);
        return $desplazamientos;
    }
}

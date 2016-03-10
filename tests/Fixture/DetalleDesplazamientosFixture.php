<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetalleDesplazamientosFixture
 *
 */
class DetalleDesplazamientosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'ruta_id' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'programacion_viaje_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'agencia_id' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hora_salida' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'hora_llegada' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_detalle_desplazamientos_programacion_viajes1_idx' => ['type' => 'index', 'columns' => ['programacion_viaje_id'], 'length' => []],
            'fk_detalle_desplazamientos_agencias1_idx' => ['type' => 'index', 'columns' => ['agencia_id'], 'length' => []],
            'fk_detalle_desplazamientos_rutas1_idx' => ['type' => 'index', 'columns' => ['ruta_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'ruta_id', 'programacion_viaje_id', 'agencia_id'], 'length' => []],
            'fk_detalle_desplazamientos_programacion_viajes1' => ['type' => 'foreign', 'columns' => ['programacion_viaje_id'], 'references' => ['programacion_viajes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_detalle_desplazamientos_agencias1' => ['type' => 'foreign', 'columns' => ['agencia_id'], 'references' => ['agencias', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_detalle_desplazamientos_rutas1' => ['type' => 'foreign', 'columns' => ['ruta_id'], 'references' => ['rutas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'ruta_id' => 1,
            'programacion_viaje_id' => 1,
            'agencia_id' => 1,
            'hora_salida' => '2016-03-10 17:53:38',
            'hora_llegada' => '2016-03-10 17:53:38'
        ],
    ];
}

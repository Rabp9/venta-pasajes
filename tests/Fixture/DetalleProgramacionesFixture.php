<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetalleProgramacionesFixture
 *
 */
class DetalleProgramacionesFixture extends TestFixture
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
        'programacion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'servicio_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_detalle_programaciones_rutas1_idx' => ['type' => 'index', 'columns' => ['ruta_id'], 'length' => []],
            'fk_detalle_programaciones_programaciones1_idx' => ['type' => 'index', 'columns' => ['programacion_id'], 'length' => []],
            'fk_detalle_programaciones_servicios1_idx' => ['type' => 'index', 'columns' => ['servicio_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'ruta_id', 'programacion_id', 'servicio_id'], 'length' => []],
            'fk_detalle_programaciones_programaciones1' => ['type' => 'foreign', 'columns' => ['programacion_id'], 'references' => ['programaciones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_detalle_programaciones_rutas1' => ['type' => 'foreign', 'columns' => ['ruta_id'], 'references' => ['rutas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_detalle_programaciones_servicios1' => ['type' => 'foreign', 'columns' => ['servicio_id'], 'references' => ['servicios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'programacion_id' => 1,
            'servicio_id' => 1
        ],
    ];
}

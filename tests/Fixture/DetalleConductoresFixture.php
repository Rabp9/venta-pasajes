<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetalleConductoresFixture
 *
 */
class DetalleConductoresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'programacion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'conductor_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'condicion' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_detalle_conductores_programaciones1_idx' => ['type' => 'index', 'columns' => ['programacion_id'], 'length' => []],
            'fk_detalle_conductores_conductores1_idx' => ['type' => 'index', 'columns' => ['conductor_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'programacion_id', 'conductor_id'], 'length' => []],
            'fk_detalle_conductores_programaciones1' => ['type' => 'foreign', 'columns' => ['programacion_id'], 'references' => ['programaciones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_detalle_conductores_conductores1' => ['type' => 'foreign', 'columns' => ['conductor_id'], 'references' => ['conductores', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'programacion_id' => 1,
            'conductor_id' => 1,
            'condicion' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}

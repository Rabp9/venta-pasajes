<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PasajesFixture
 *
 */
class PasajesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'persona_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'bus_asiento_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'programacion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'valor' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'fechahora' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_pasajes_bus_asientos1_idx' => ['type' => 'index', 'columns' => ['bus_asiento_id'], 'length' => []],
            'fk_pasajes_personas1_idx' => ['type' => 'index', 'columns' => ['persona_id'], 'length' => []],
            'fk_pasajes_programaciones1_idx' => ['type' => 'index', 'columns' => ['programacion_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'persona_id', 'bus_asiento_id', 'programacion_id'], 'length' => []],
            'fk_pasajes_bus_asientos1' => ['type' => 'foreign', 'columns' => ['bus_asiento_id'], 'references' => ['bus_asientos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_pasajes_personas1' => ['type' => 'foreign', 'columns' => ['persona_id'], 'references' => ['personas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_pasajes_programaciones1' => ['type' => 'foreign', 'columns' => ['programacion_id'], 'references' => ['programaciones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'persona_id' => 1,
            'bus_asiento_id' => 1,
            'programacion_id' => 1,
            'valor' => 1.5,
            'fechahora' => '2016-03-27 22:15:11'
        ],
    ];
}

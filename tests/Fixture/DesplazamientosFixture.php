<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DesplazamientosFixture
 *
 */
class DesplazamientosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'origen' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'destino' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_desplazamientos_agencias1_idx' => ['type' => 'index', 'columns' => ['origen'], 'length' => []],
            'fk_desplazamientos_agencias2_idx' => ['type' => 'index', 'columns' => ['destino'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'origen', 'destino'], 'length' => []],
            'fk_desplazamientos_agencias1' => ['type' => 'foreign', 'columns' => ['origen'], 'references' => ['agencias', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_desplazamientos_agencias2' => ['type' => 'foreign', 'columns' => ['destino'], 'references' => ['agencias', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'origen' => 1,
            'destino' => 1
        ],
    ];
}

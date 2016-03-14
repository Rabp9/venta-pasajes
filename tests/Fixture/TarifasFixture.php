<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TarifasFixture
 *
 */
class TarifasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'origen' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'destino' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'precio_min' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'precio_max' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'tiempo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_tarifas_agencias1_idx' => ['type' => 'index', 'columns' => ['origen'], 'length' => []],
            'fk_tarifas_agencias2_idx' => ['type' => 'index', 'columns' => ['destino'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'origen', 'destino'], 'length' => []],
            'fk_tarifas_agencias1' => ['type' => 'foreign', 'columns' => ['origen'], 'references' => ['agencias', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tarifas_agencias2' => ['type' => 'foreign', 'columns' => ['destino'], 'references' => ['agencias', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'destino' => 1,
            'precio_min' => 1.5,
            'precio_max' => 1.5,
            'tiempo' => 1
        ],
    ];
}

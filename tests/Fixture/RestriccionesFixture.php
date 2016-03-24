<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RestriccionesFixture
 *
 */
class RestriccionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'desplazamiento_x' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'desplazamiento_y' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'valor' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_restrcciones_detalle_desplazamientos1_idx' => ['type' => 'index', 'columns' => ['desplazamiento_x'], 'length' => []],
            'fk_restrcciones_detalle_desplazamientos2_idx' => ['type' => 'index', 'columns' => ['desplazamiento_y'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'desplazamiento_x', 'desplazamiento_y'], 'length' => []],
            'fk_restrcciones_detalle_desplazamientos1' => ['type' => 'foreign', 'columns' => ['desplazamiento_x'], 'references' => ['detalle_desplazamientos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_restrcciones_detalle_desplazamientos2' => ['type' => 'foreign', 'columns' => ['desplazamiento_y'], 'references' => ['detalle_desplazamientos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'desplazamiento_x' => 1,
            'desplazamiento_y' => 1,
            'valor' => 'Lorem ipsum dolor sit ame'
        ],
    ];
}

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleProgramacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleProgramacionesTable Test Case
 */
class DetalleProgramacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleProgramacionesTable
     */
    public $DetalleProgramaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalle_programaciones',
        'app.rutas',
        'app.detalle_desplazamientos',
        'app.tarifas',
        'app.desplazamientos',
        'app.agencia_origen',
        'app.ubigeos',
        'app.agencias',
        'app.estados',
        'app.bus_asientos',
        'app.agencia_destino',
        'app.servicios',
        'app.programaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetalleProgramaciones') ? [] : ['className' => 'App\Model\Table\DetalleProgramacionesTable'];
        $this->DetalleProgramaciones = TableRegistry::get('DetalleProgramaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetalleProgramaciones);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleConductoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleConductoresTable Test Case
 */
class DetalleConductoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleConductoresTable
     */
    public $DetalleConductores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalle_conductores',
        'app.programaciones',
        'app.buses',
        'app.estados',
        'app.bus_asientos',
        'app.bus_pisos',
        'app.conductores',
        'app.personas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetalleConductores') ? [] : ['className' => 'App\Model\Table\DetalleConductoresTable'];
        $this->DetalleConductores = TableRegistry::get('DetalleConductores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetalleConductores);

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

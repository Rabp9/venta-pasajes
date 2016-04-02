<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusAsientosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusAsientosTable Test Case
 */
class BusAsientosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BusAsientosTable
     */
    public $BusAsientos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bus_asientos',
        'app.bus_pisos',
        'app.buses',
        'app.estados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BusAsientos') ? [] : ['className' => 'App\Model\Table\BusAsientosTable'];
        $this->BusAsientos = TableRegistry::get('BusAsientos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BusAsientos);

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

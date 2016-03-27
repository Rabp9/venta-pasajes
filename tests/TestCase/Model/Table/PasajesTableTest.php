<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PasajesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PasajesTable Test Case
 */
class PasajesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PasajesTable
     */
    public $Pasajes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pasajes',
        'app.personas',
        'app.conductores',
        'app.estados',
        'app.bus_asientos',
        'app.programaciones',
        'app.buses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pasajes') ? [] : ['className' => 'App\Model\Table\PasajesTable'];
        $this->Pasajes = TableRegistry::get('Pasajes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pasajes);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgramacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgramacionesTable Test Case
 */
class ProgramacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgramacionesTable
     */
    public $Programaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.programaciones',
        'app.buses',
        'app.estados',
        'app.bus_asientos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Programaciones') ? [] : ['className' => 'App\Model\Table\ProgramacionesTable'];
        $this->Programaciones = TableRegistry::get('Programaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Programaciones);

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

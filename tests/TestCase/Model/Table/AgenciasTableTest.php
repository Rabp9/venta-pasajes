<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgenciasTable Test Case
 */
class AgenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AgenciasTable
     */
    public $Agencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.agencias',
        'app.ubigeos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Agencias') ? [] : ['className' => 'App\Model\Table\AgenciasTable'];
        $this->Agencias = TableRegistry::get('Agencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Agencias);

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

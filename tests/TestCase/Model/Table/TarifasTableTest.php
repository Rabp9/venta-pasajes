<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TarifasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TarifasTable Test Case
 */
class TarifasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TarifasTable
     */
    public $Tarifas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tarifas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tarifas') ? [] : ['className' => 'App\Model\Table\TarifasTable'];
        $this->Tarifas = TableRegistry::get('Tarifas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tarifas);

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
}

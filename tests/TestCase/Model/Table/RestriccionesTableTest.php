<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RestriccionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RestriccionesTable Test Case
 */
class RestriccionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RestriccionesTable
     */
    public $Restricciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.restricciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Restricciones') ? [] : ['className' => 'App\Model\Table\RestriccionesTable'];
        $this->Restricciones = TableRegistry::get('Restricciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Restricciones);

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

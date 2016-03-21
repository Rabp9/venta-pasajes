<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesplazamientosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesplazamientosTable Test Case
 */
class DesplazamientosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DesplazamientosTable
     */
    public $Desplazamientos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.desplazamientos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Desplazamientos') ? [] : ['className' => 'App\Model\Table\DesplazamientosTable'];
        $this->Desplazamientos = TableRegistry::get('Desplazamientos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Desplazamientos);

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

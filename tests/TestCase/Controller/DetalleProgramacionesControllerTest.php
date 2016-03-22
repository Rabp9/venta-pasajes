<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DetalleProgramacionesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DetalleProgramacionesController Test Case
 */
class DetalleProgramacionesControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

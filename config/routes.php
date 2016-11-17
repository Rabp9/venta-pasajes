<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    // $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});

Router::scope('/', function ($routes) {
    $routes->extensions(['json']);
    $routes->resources('Buses', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'subir/' => [
                'action' => 'subir',
                'method' => 'POST'
            ]
        ]
    ]);
    $routes->resources('Estados');
    $routes->resources('Clientes', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],       
            'findByRuc/:ruc' => [
                'action' => 'findByRuc',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Importar', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'preLoad/' => [
                'action' => 'preLoad',
                'method' => 'POST'
            ],
            'import/' => [
                'action' => 'import',
                'method' => 'POST'
            ],
            'export/' => [
                'action' => 'export',
                'method' => 'POST'
            ],
            'getExportCountClientes/' => [
                'action' => 'getExportCountClientes',
                'method' => 'GET'
            ],
            'getExportCountPasajes/' => [
                'action' => 'getExportCountPasajes',
                'method' => 'GET'
            ],
            'getExportCountGiros/' => [
                'action' => 'getExportCountGiros',
                'method' => 'GET'
            ],
            'getExportCountEncomiendas/' => [
                'action' => 'getExportCountEncomiendas',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('rutas', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],       
            'hasRestricciones/:id' => [
                'action' => 'hasRestricciones',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Agencias');
    $routes->resources('Groups');
    $routes->resources('Encomiendas', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'asignar' => [
                'action' => 'asignar',
                'method' => 'POST'
            ],
            'getPendientes' => [
                "action" => "getPendientes",
                "method" => "GET"
            ],
            'getSinEntregar' => [
                "action" => "getSinEntregar",
                "method" => "GET"
            ],
            'getOrigenDestino' => [
                'action' => 'getOrigenDestino',
                'method' => 'POST'
            ],
            'cancelarAsignacion' => [
                'action' => 'cancelarAsignacion',
                'method' => 'POST'
            ],
            'cancelarAsignacionMany' => [
                'action' => 'cancelarAsignacionMany',
                'method' => 'POST'
            ],
            'registrarEntrega' => [
                'action' => 'registrarEntrega',
                'method' => 'POST'
            ],
            'registrarEntregaMany' => [
                'action' => 'registrarEntregaMany',
                'method' => 'POST'
            ],
            'getNextNroDoc/:tipodoc' => [
                'action' => 'getNextNroDoc',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Giros', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'asignar' => [
                'action' => 'asignar',
                'method' => 'POST'
            ],
            'llamar' => [
                'action' => 'llamar',
                'method' => 'POST'
            ],
            'getPendientes' => [
                "action" => "getPendientes",
                "method" => "GET"
            ],
            'getSinEntregar' => [
                "action" => "getSinEntregar",
                "method" => "GET"
            ],
            'getOrigenDestino' => [
                'action' => 'getOrigenDestino',
                'method' => 'POST'
            ],
            'cancelarAsignacion' => [
                'action' => 'cancelarAsignacion',
                'method' => 'POST'
            ],
            'cancelarAsignacionMany' => [
                'action' => 'cancelarAsignacionMany',
                'method' => 'POST'
            ],
            'registrarEntrega' => [
                'action' => 'registrarEntrega',
                'method' => 'POST'
            ],
            'registrarEntregaMany' => [
                'action' => 'registrarEntregaMany',
                'method' => 'POST'
            ],
            'getNextNroDoc' => [
                'action' => 'getNextNroDoc',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('TipoProductos');
    $routes->resources('Pasajes', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'getEstado/:bus_asiento_id/:programacion_id/:detalle_desplazamiento_id' => [
                'action' => 'getEstado',
                'method' => 'GET'
            ],
            'getNextNroDoc/' => [
                'action' => 'getNextNroDoc',
                'method' => 'GET'
            ],
            'getForPrint/:programacion_id/:detalle_desplazamiento_id/:bus_asiento_id' => [
                'action' => 'getForPrint',
                'method' => 'GET'
            ],
            'cancel' => [
                'action' => 'cancel',
                'method' => 'POST'
            ]
        ]
    ]);
    $routes->resources('Ubigeos', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'findByParent/:parent_id' => [
                'action' => 'findByParent',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Programaciones', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'getByFechaByOrigenByDestino' => [
                'action' => 'getByFechaByOrigenByDestino',
                'method' => 'POST'
            ],
            'getDisponibles' => [
                'action' => 'getDisponibles',
                'method' => 'GET'
            ],
            'getAnteriores' => [
                'action' => 'getAnteriores',
                'method' => 'GET'
            ],
            'registrarSalidaPost' => [
                'action' => 'registrarSalidaPost',
                'method' => 'POST'
            ]
        ]
    ]);
    $routes->resources('BusPisos');
    $routes->resources('BusAsientos');
    $routes->resources('DetalleDesplazamientos', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'getByRutaAndDesplazamiento/:ruta_id/:desplazamiento_id' => [
                'action' => 'getByRutaAndDesplazamiento',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Restricciones', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'saveMany/' => [
                'action' => 'saveMany',
                'method' => 'POST'
            ],
            'getValues/' => [
                'action' => 'getValues',
                'method' => 'POST'
            ]
        ]
    ]);
    $routes->resources('Desplazamientos', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'index/:origen/:destino' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'getByOrigenAndDestino/:origen/:destino' => [
                'action' => 'getByOrigenAndDestino',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Servicios', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'findServiciosAvailablesByRuta/:ruta_id' => [
                'action' => 'findServiciosAvailablesByRuta',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Personas', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'findByDni/:dni' => [
                'action' => 'findByDni',
                'method' => 'GET'
            ],
            'findByNombre/:nombre' => [
                'action' => 'findByNombre',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Conductores', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'findByDni/:dni' => [
                'action' => 'findByDni',
                'method' => 'GET'
            ],
            'getMany' => [
                'action' => 'getMany',
                'method' => 'POST'
            ]
        ]
    ]);
    $routes->resources('Tarifas', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'index/:servicio_id/:origen/:destino' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'getTarifas/:desplazamiento_id/:servicio_id' => [
                'action' => 'getTarifas',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('users', [
        'map' => [
            '/' => [
                'action' => 'index',
                'method' => 'GET'
            ],
            'login' => [
                'action' => 'login',
                'method' => 'POST'
            ],
            'manage' => [
                'action' => 'manage',
                'method' => 'POST'
            ]
        ]
    ]);
});
/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

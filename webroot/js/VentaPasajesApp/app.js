var VentaPasajesApp = angular.module("VentaPasajesApp", [
    "ngRoute", 
    "ngResource", 
    "ngAnimate", 
    "ngFileUpload", 
    "ngInputDate",
    "checklist-model",
    "LocalStorageModule"
]);

VentaPasajesApp.path_location = "http://localhost:8000/venta-pasajes/";

VentaPasajesApp.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            controller: "HomeController",
            templateUrl: "Pages/home",
            title: 'Home'
        })
        .when("/agencias", {
            controller: "ListAgenciasController",
            templateUrl: "agencias",
            title: 'Agencias'
        })
        .when("/buses/:type?/:text?", {
            controller: "ListBusesController",
            templateUrl: "buses",
            title: 'Buses'
        })
        .when("/busesAdministrar/:id", {
            controller: "AdministrarBusesController",
            templateUrl: "buses/administrar",
            title: 'Administrar Bus'
        })
        .when("/clientes", {
            controller: "ListClientesController",
            templateUrl: "clientes",
            title: 'Clientes'
        })
        .when("/conductores", {
            controller: "ListConductoresController",
            templateUrl: "conductores",
            title: 'Conductores'
        })
        .when("/encomiendas", {
            controller: "EncomiendasController",
            templateUrl: "encomiendas",
            title: 'Encomiendas'
        })
        .when("/encomiendas/:id", {
            controller: "EncomiendasViewController",
            templateUrl: "Encomiendas/view",
            title: 'Ver Encomienda'
        })
        .when("/giros", {
            controller: "GirosController",
            templateUrl: "giros",
            title: 'Giros'
        })
        .when("/importar", {
            controller: "ImportarController",
            templateUrl: "Pages/importar",
            title: 'Importar y Exportar'
        })
        .when("/pasajes", {
            controller: "PasajesController",
            templateUrl: "pasajes",
            title: 'Pasajes'
        })
        .when("/pasajes/:id", {
            controller: "PasajesViewController",
            templateUrl: "pasajes/view",
            title: 'Ver Pasaje'
        })
        .when("/personas", {
            controller: "ListPersonasController",
            templateUrl: "personas",
            title: 'Personas'
        })
        .when("/programaciones/:type?/:text?", {
            controller: "ListProgramacionesController",
            templateUrl: "programaciones",
            title: 'Programaciones'
        })
        .when("/rutas", {
            controller: "ListRutasController",
            templateUrl: "rutas",
            title: 'Rutas'
        })
        .when("/servicios", {
            controller: "ListServiciosController",
            templateUrl: "servicios",
            title: 'Servicios'
        })
        .when("/tarifas", {
            controller: "ListTarifasController",
            templateUrl: "tarifas",
            title: 'Tarifas'
        })
        .when("/tipoProductos", {
            controller: "ListTipoProductosController",
            templateUrl: "tipoProductos",
            title: 'Tipo de Productos'
        })
        .when('/users/manage', {
            controller: 'UsersController',
            templateUrl: 'users/manage',
            title: 'Usuarios'
        })
        .when('/users/login', {
            controller: 'UsersController',
            templateUrl: 'users/login',
            title: 'Login'
        })
    ;
});

VentaPasajesApp.filter('filterUbigeo', function() {
    return function(input, search) {
        if (!input) return input;
        if (!search) return input;
        var expected = ('' + search).toLowerCase();
        var result = {};
        angular.forEach(input, function(value, key) {
            var actual = ('' + value.descripcion).toLowerCase();
            if (actual.indexOf(expected) !== -1) {
                result[key] = value;
            }
        });
        return result;
    }
});

VentaPasajesApp.filter('makeRange', function() {
    return function(input) {
        var lowBound, highBound;
        switch (input.length) {
        case 1:
            lowBound = 0;
            highBound = parseInt(input[0]) - 1;
            break;
        case 2:
            lowBound = parseInt(input[0]);
            highBound = parseInt(input[1]);
            break;
        default:
            return input;
        }
        var result = [];
        for (var i = lowBound; i <= highBound; i++)
            result.push(i);
        return result;
    };
});

VentaPasajesApp.filter('sexo', function() {
    return function(input) {
        switch(input) {
            case 'M': return 'Masculino';
            case 'F': return 'Femenino';
        }
        return '';
    };
});

VentaPasajesApp.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

VentaPasajesApp.directive('dvDraggable', function() {
    return {
        link: function (scope, element, attrs) {
            var nroPiso = attrs.nroPiso;
            var nroAsiento = attrs.nroAsiento;

            var bus_asiento = scope.bus.bus_pisos[nroPiso].bus_asientos[nroAsiento];
            
            element.css("left", bus_asiento.x);
            element.css("top", bus_asiento.y);
            element.css("position", "absolute");
        }
    };
});

VentaPasajesApp.directive('ngRightClick', function($parse) {
    return function(scope, element, attrs) {
        var fn = $parse(attrs.ngRightClick);
        element.bind('contextmenu', function(event) {
            scope.$apply(function() {
                event.preventDefault();
                fn(scope, {$event:event});
            });
        });
    };
});

VentaPasajesApp.run(function($rootScope, $timeout, $route, localStorageService, $window, $location) {

    $rootScope.layout = {};
    $rootScope.layout.loading = false; 

    $rootScope.$on('$routeChangeStart', function() {

        //show loading gif
        $rootScope.layout.loading = true;

    });

    $rootScope.$on('$routeChangeSuccess', function(currentRoute, previousRoute) {
        // hide loading gif
        $timeout(function(){
            $rootScope.layout.loading = false;
        }, 500);
        
        // setting title
        $rootScope.title = $route.current.title;

        if ($route.current.title == 'Login') {
            $rootScope.isLogin = true;
        }
        
        // loading user info
        if (localStorageService.get('user-authenticated')) {
            $rootScope.user = localStorageService.get('user-authenticated');
        }
        
        if ($route.current.title == 'Home') {
            if ($rootScope.user != undefined) {
                $('#dvRibbonMenu').removeClass('ng-hide');
            } else {
                $window.open('#/users/login', '_self');
            }
        }
        
        /*if (localStorageService.get('user-authenticated')) {
            $rootScope.user = localStorageService.get('user-authenticated');
        } else {
            console.log($location.absUrl());
            //$window.open('Users/login', '_self')
        }*/
    });

    $rootScope.$on('$routeChangeError', function() {

        //hide loading gif
        $rootScope.layout.loading = false;
    });
   
    $rootScope.logout = function() {
        if (confirm('¿Está seguro de cerrar sesión?')) {
            localStorageService.remove('user-authenticated');
            $window.open('/venta-pasajes/users/login', '_self');
        }
    };
    
    $rootScope.refresh = function() {
        $route.reload();
    }
    
});
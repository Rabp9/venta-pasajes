var VentaPasajesApp = angular.module("VentaPasajesApp", ["ngRoute", "ngResource", "ngAnimate", "ngFileUpload"]);

VentaPasajesApp.path_location = "http://localhost:8000/venta-pasajes/";

VentaPasajesApp.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            controller: "HomeController",
            templateUrl: "templates/home.html"
        })
        .when("/buses", {
            controller: "ListBusesController",
            templateUrl: "buses"
        })
        .when("/buses/administrar/:id", {
            controller: "AdministrarBusesController",
            templateUrl: "buses/administrar"
        })
        .when("/agencias", {
            controller: "ListAgenciasController",
            templateUrl: "agencias"
        })
        .when("/rutas", {
            controller: "ListRutasController",
            templateUrl: "rutas"
        })
        .when("/tarifas", {
            controller: "ListTarifasController",
            templateUrl: "tarifas"
        })
        .when("/personas", {
            controller: "ListPersonasController",
            templateUrl: "personas"
        })
        .when("/conductores", {
            controller: "ListConductoresController",
            templateUrl: "conductores"
        })
        .when("/programaciones", {
            controller: "ListProgramacionesController",
            templateUrl: "programaciones"
        })
        .when("/programaciones/add", {
            controller: "AddProgramacionesController",
            templateUrl: "programaciones/add"
        })
        .when("/servicios", {
            controller: "ListServiciosController",
            templateUrl: "servicios"
        })
        .when("/pasajes", {
            controller: "PasajesController",
            templateUrl: "pasajes"
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
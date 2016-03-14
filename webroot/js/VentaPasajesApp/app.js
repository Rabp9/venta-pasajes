var VentaPasajesApp = angular.module("VentaPasajesApp", ["ngRoute", "ngResource", "ngAnimate"]);

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
        });
});
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
            templateUrl: "ru    tas"
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
        .when("/servicios", {
            controller: "ListServiciosController",
            templateUrl: "servicios"
        })
    ;
});

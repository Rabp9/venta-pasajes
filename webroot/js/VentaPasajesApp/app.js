var VentaPasajesApp = angular.module("VentaPasajesApp", ["ngRoute", "ngResource"]);

VentaPasajesApp.path_location = "http://localhost:8000/";

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
        });
});
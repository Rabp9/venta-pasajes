var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AdministrarBusesController", function($scope, BusesService, $routeParams) {
    BusesService.get({id: $routeParams.id}, function(data) {
        $scope.bus = data.bus;
    });
});
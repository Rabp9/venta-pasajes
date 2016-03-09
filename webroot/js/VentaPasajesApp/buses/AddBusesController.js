var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddBusesController", function($scope, BusesService) {
    $scope.newBus = new BusesService();
    
    $scope.addBus = function() {
        var bus = BusesService.save($scope.newBus, function() {
            $("#mdlBuses").modal('toggle');
            $scope.newBus = new BusesService();
            $scope.$parent.list();
        });
    }
});
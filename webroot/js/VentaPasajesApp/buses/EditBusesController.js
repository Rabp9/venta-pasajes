var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditBusesController", function($scope, BusesService, EstadosService) {
    $scope.editBus = new BusesService();
    $scope.estados = new EstadosService();
    
    $scope.editBus = BusesService.get({ id: $scope.$parent.id }, function() {
        $scope.editBus = $scope.editBus.bus;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
    $scope.updateBus = function() {
        var bus = BusesService.save($scope.editBus, function() {
            $("#mdlBuses").modal('toggle');
            $scope.editBus = new BusesService();
            $scope.$parent.list();
        });
    }
});
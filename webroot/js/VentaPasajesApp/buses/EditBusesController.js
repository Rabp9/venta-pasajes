var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditBusesController", function($scope, BusesService, EstadosService) {
    $scope.estados = new EstadosService();
    
    $scope.editBus = BusesService.get({ id: $scope.$parent.id }, function() {
        $scope.editBus = $scope.editBus.bus;
        delete $scope.editBus.estado;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
    $scope.updateBus = function() {
        var bus = BusesService.get({id: $scope.$parent.id}, function() {
            bus = angular.extend(bus, $scope.editBus);
            delete bus.estado;
            bus.$update({id: $scope.$parent.id}, function(data) {
                console.log(data);
                $("#mdlBuses").modal('toggle');
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
            });
        });
    }
});
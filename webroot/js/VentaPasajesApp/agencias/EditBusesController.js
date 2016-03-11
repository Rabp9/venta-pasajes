var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditAgenciasController", function($scope, AgenciasService, EstadosService) {
    $scope.estados = new EstadosService();
    
    $scope.editAgencia = AgenciasService.get({ id: $scope.$parent.id }, function() {
        $scope.editAgencia = $scope.editAgencia.agencia;
        delete $scope.editAgencia.estado;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
    $scope.updateBus = function() {
        var bus = BusesService.get({id: $scope.$parent.id}, function() {
            bus = angular.extend(bus, $scope.editBus);
            delete bus.estado; 
            bus.$update({id: $scope.$parent.id}, function() {
                $("#mdlBuses").modal('toggle');
                $scope.$parent.list();
            });
        });
    }
});
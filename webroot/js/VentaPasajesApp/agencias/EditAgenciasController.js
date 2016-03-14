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
    
    $scope.updateAgencia = function() {
        var agencia = AgenciasService.get({id: $scope.$parent.id}, function() {
            agencia = angular.extend(agencia, $scope.editBus);
            delete agencia.estado; 
            agencia.$update({id: $scope.$parent.id}, function() {
                $("#mdlAgencias").modal('toggle');
                $scope.$parent.list();
            });
        });
    }
});
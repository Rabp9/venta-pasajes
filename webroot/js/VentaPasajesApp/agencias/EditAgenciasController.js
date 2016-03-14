var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditAgenciasController", function($scope, AgenciasService, EstadosService, UbigeosService) {
    $scope.estados = new EstadosService();
    $scope.ubigeos = new UbigeosService();
    
    $scope.editAgencia = AgenciasService.get({ id: $scope.$parent.id }, function() {
        $scope.editAgencia = $scope.editAgencia.agencia;
        delete $scope.editAgencia.estado;
        delete $scope.editAgencia.ubigeo;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
    $scope.ubigeos = UbigeosService.get(function() {
        $scope.ubigeos = $scope.ubigeos.ubigeos;
        $scope.ubigeos = Object.keys($scope.ubigeos).map(function(value, index) {
            var obj = {
                id: parseInt(value),
                descripcion: $scope.ubigeos[value]
            };
            return obj;
        });
    });
    
    $scope.updateAgencia = function() {
        alert("dasdas");
        var agencia = AgenciasService.get({id: $scope.$parent.id}, function() {
            agencia = angular.extend(agencia, $scope.editAgencia);
            delete agencia.estado; 
            delete agencia.ubigeo; 
            agencia.$update({id: $scope.$parent.id}, function() {
                $("#mdlAgencias").modal('toggle');
                $scope.$parent.list();
            });
        });
    }
});
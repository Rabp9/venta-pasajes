var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddAgenciasController", function($scope, AgenciasService, UbigeosService) {
    $scope.newAgencia = new AgenciasService();
    
    UbigeosService.findByParent({parent_id: 0},function(data) {
        $scope.departamentos = data.ubigeos;
    });
    
    $scope.addAgencia = function() {
        AgenciasService.save($scope.newAgencia, function(data) {
            $("#mdlAgencias").modal('toggle');
            $scope.newAgencia = new AgenciasService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });
    };
    
    $scope.onDepartamentoSelect = function() {
        UbigeosService.findByParent({parent_id: $scope.departamentoSelected}, function(data) {
            $scope.provincias = data.ubigeos;
        });
        $scope.distritos = [];
    };
    
    $scope.onProvinciaSelect = function() {
        UbigeosService.findByParent({parent_id: $scope.provinciaSelected}, function(data) {
            $scope.distritos = data.ubigeos;
        });
    };
});

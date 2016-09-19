var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditAgenciasController", function($scope, AgenciasService, EstadosService, UbigeosService) {
    $scope.estados = new EstadosService();
    $scope.ubigeos = new UbigeosService();
    
    UbigeosService.findByParent({parent_id: 0},function(data) {
        $scope.departamentos = data.ubigeos;
    });
    
    UbigeosService.findByParent({parent_id: 0},function(data) {
        $scope.departamentos = data.ubigeos;
    });
    
    AgenciasService.get({ id: $scope.$parent.id }, function(data) {
        $scope.editAgencia = data.agencia;
        $scope.departamentoSelected = $scope.editAgencia.ubigeo.parent_ubigeos1.parent_ubigeos2.id;
        $scope.onDepartamentoSelect();
        $scope.provinciaSelected = $scope.editAgencia.ubigeo.parent_ubigeos1.id;
        $scope.onProvinciaSelect();
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
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
    
    $scope.updateAgencia = function() {
        $("#btnRegistrar").addClass("disabled");
        $("#btnRegistrar").prop("disabled", true);
        var agencia = AgenciasService.get({id: $scope.$parent.id}, function() {
            agencia = angular.extend(agencia, $scope.editAgencia);
            delete agencia.estado; 
            delete agencia.ubigeo; 
            agencia.$update({id: $scope.$parent.id}, function(data) {
                $("#mdlAgencias").modal('toggle');
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
            });
        });
    }
});
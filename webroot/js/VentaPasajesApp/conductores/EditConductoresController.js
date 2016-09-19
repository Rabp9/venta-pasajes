var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditConductoresController", function($scope, ConductoresService, EstadosService) {
    $scope.estados = new EstadosService();
    
    $scope.editConductor = ConductoresService.get({ id: $scope.$parent.id }, function() {
        $scope.editConductor = $scope.editConductor.conductor;
        delete $scope.editConductor.estado;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });  
    $scope.updateConductor = function() {
        $("#btnRegistrarConductor").addClass("disabled");
        $("#btnRegistrarConductor").prop("disabled", true);
        var conductor = ConductoresService.get({id: $scope.$parent.id}, function() {
            conductor = angular.extend(conductor, $scope.editConductor);
            delete conductor.estado;
            conductor.$update({id: $scope.$parent.id}, function(data) {
                $("#mdlConductores").modal('toggle');
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
            });
        });
    }
});
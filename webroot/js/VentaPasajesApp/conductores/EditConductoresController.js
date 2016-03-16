var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditPersonasController", function($scope, ConductoresService, EstadosService) {
    $scope.estados = new EstadosService();
    
    $scope.editConductor = PersonasService.get({ id: $scope.$parent.id }, function() {
        $scope.editconductor = $scope.editConductor.conductor;
        delete $scope.editConductor.estado;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
    $scope.updateConductor = function() {
        var conductor = ConductoresService.get({id: $scope.$parent.id}, function() {
            conductor = angular.extend(conductor, $scope.editConductor);
            delete conductor.estado;
            conductor.$update({id: $scope.$parent.id}, function(data) {
                $("#mdlConductores").modal('toggle');
                var message = {
                    type: "success",
                    text: "Conductor modificado correctamente"
                };
                $scope.$parent.actualizarMessage(message);
                $scope.$parent.list();
            });
        });
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditServiciosController", function($scope, ServiciosService, EstadosService) {
    $scope.estados = new EstadosService();
    
    $scope.editServicio = ServiciosService.get({ id: $scope.$parent.id }, function() {
        $scope.editServicio = $scope.editServicio.servicio;
        delete $scope.editServicio.estado;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
    $scope.updateServicio = function() {
        var servicio = ServiciosService.get({id: $scope.$parent.id}, function() {
            servicio = angular.extend(servicio, $scope.editServicio);
            delete servicio.estado;
            servicio.$update({id: $scope.$parent.id}, function(data) {
                $("#mdlServicios").modal('toggle');
                var message = {
                    type: "success",
                    text: "Servicio modificado correctamente"
                };
                $scope.$parent.actualizarMessage(message);
                $scope.$parent.list();
            });
        });
    }
});
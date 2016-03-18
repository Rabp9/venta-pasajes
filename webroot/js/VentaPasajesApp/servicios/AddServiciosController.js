var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddServiciosController", function($scope, ServiciosService) {
    $scope.newServicio = new ServiciosService();
    
    $scope.addServicio = function() {
        ServiciosService.save($scope.newServicio, function(data) {
            console.log(data);
            $("#mdlServicios").modal('toggle');
            $scope.newServicio = new ServiciosService();
            var message = {
                type: "success",
                text: "Servicio registrado correctamente"
            };
            $scope.$parent.actualizarMessage(message);
            $scope.$parent.list();
        });;
    }
});
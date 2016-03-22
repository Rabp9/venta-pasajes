var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddServiciosController", function($scope, ServiciosService) {
    $scope.newServicio = new ServiciosService();
    
    $scope.addServicio = function() {
        ServiciosService.save($scope.newServicio, function(data) {
            console.log(data);
            $("#mdlServicios").modal('toggle');
            $scope.newServicio = new ServiciosService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });;
    }
});
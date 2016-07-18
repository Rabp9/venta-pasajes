var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddServiciosController", function($scope, ServiciosService) {
    $scope.newServicio = new ServiciosService();
    
    $scope.addServicio = function() {
        $("#btnRegistrar").addClass("disabled");
        ServiciosService.save($scope.newServicio, function(data) {
            $("#mdlServicios").modal('toggle');
            $scope.newServicio = new ServiciosService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });;
    }
});
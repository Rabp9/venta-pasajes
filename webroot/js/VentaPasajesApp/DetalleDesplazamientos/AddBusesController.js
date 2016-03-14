var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddDetalleDesplazamientosController", function($scope, DetalleDesplazamientosService) {
    $scope.newDetalleDesplazamiento = new DetalleDesplazamientosService();
    
    $scope.addDetalleDesplazamiento = function() {
        var bus = DetalleDesplazamientosService.save($scope.newDetalleDesplazamiento, function() {
            $("#mdlDetalleDesplazamientos").modal('toggle');
            $scope.newDetalleDesplazamiento = new DetalleDesplazamientosService();
            $scope.$parent.list();
        });
    }
});
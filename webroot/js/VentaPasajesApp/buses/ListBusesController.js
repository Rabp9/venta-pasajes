var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListBusesController", function($scope, BusesService) {
    $scope.buses = [];
    
    $scope.list = function() {
        $scope.buses = BusesService.get();
    };
    
    $scope.addBus = function() {
        $scope.modalUrl = "http://localhost:8000/venta-pasajes/buses/add";
    };
    
    $scope.editBus = function() {
        $scope.modalUrl = "http://localhost:8000/venta-pasajes/buses/edit";
    };
    
    $scope.list();
});
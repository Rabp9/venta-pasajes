var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListBusesController", function($scope, BusesService) {
    $scope.buses = [];
    $scope.id = "";
    
    $scope.list = function() {
        $scope.buses = BusesService.get(function() {
            $scope.buses = $scope.buses.buses;
        });
    };
    
    $scope.addBus = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "venta-pasajes/buses/add";
    };
    
    $scope.editBus = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "venta-pasajes/buses/edit/" + id;
    };
    
    $scope.viewBus = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "venta-pasajes/buses/view/" + id;
    };
    
    
    $scope.list();
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ViewBusesController", function($scope, BusesService) {
    $scope.viewBus = new BusesService();
    
    $scope.viewBus = BusesService.get({ id: $scope.$parent.id }, function() {
        $scope.viewBus = $scope.viewBus.bus;
    });
});
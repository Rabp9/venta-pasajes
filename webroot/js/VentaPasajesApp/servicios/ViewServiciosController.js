var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ViewServiciosController", function($scope, ServiciosService) {
    $scope.viewServicio = new ServiciosService();
    
    $scope.viewServicio = ServiciosService.get({ id: $scope.$parent.id }, function() {
        $scope.viewServicio = $scope.viewServicio.bus;
    });
});
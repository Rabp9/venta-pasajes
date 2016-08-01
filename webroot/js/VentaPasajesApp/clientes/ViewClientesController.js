var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ViewClientesController", function($scope, AgenciasService) {
    $scope.viewAgencia = new AgenciasService();
    
    $scope.viewAgencia = AgenciasService.get({ id: $scope.$parent.id }, function() {
        $scope.viewAgencia = $scope.viewAgencia.agencia;
    });
});
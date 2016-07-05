var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ViewTipoProductosController", function($scope, TipoProductosService) {
    $scope.viewTipoProducto = new TipoProductosService();
    
    $scope.viewTipoProducto = TipoProductosService.get({ id: $scope.$parent.id }, function() {
        $scope.viewTipoProducto = $scope.viewTipoProducto.bus;
    });
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddTipoProductosController", function($scope, TipoProductosService) {
    $scope.newTipoProducto = new TipoProductosService();
    
    $scope.addTipoProducto = function() {
        $("#btnRegistrar").addClass("disabled");
        TipoProductosService.save($scope.newTipoProducto, function(data) {
            console.log(data);
            $("#mdlTipoProductos").modal('toggle');
            $scope.newTipoProducto = new TipoProductosService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });;
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddTipoProductosController", function($scope, TipoProductosService) {
    $scope.newTipoProducto = new TipoProductosService();
    $scope.newTipoProducto.estado_id = 1;
    
    $scope.addTipoProducto = function() {
        $("#btnRegistrar").addClass("disabled");
        $("#btnRegistrar").prop("disabled", false);
        TipoProductosService.save($scope.newTipoProducto, function(data) {
            console.log(data);
            $("#mdlTipoProductos").modal('toggle');
            $scope.newTipoProducto = new TipoProductosService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });;
    }
});
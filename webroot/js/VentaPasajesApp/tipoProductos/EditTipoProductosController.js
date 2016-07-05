var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditTipoProductosController", function($scope, TipoProductosService, EstadosService) {
    $scope.estados = new EstadosService();
    
    $scope.editTipoProducto = TipoProductosService.get({ id: $scope.$parent.id }, function() {
        $scope.editTipoProducto = $scope.editTipoProducto.tipoProducto;
        delete $scope.editTipoProducto.estado;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
    $scope.updateTipoProducto = function() {
        $("#btnRegistrar").addClass("disabled");
        var tipoProducto = TipoProductosService.get({id: $scope.$parent.id}, function() {
            tipoProducto = angular.extend(tipoProducto, $scope.editTipoProducto);
            delete tipoProducto.estado;
            tipoProducto.$update({id: $scope.$parent.id}, function(data) {
                $("#mdlTipoProductos").modal('toggle');
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
            });
        });
    }
});
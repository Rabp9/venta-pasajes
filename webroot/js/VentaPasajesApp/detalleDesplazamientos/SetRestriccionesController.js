var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("SetRestriccionesController", function($scope, RestriccionesService) {
    $scope.desplazamientos_x = $scope.$parent.ruta_selected.detalle_desplazamientos;
    $scope.desplazamientos_y = $scope.$parent.ruta_selected.detalle_desplazamientos;
    $scope.restricciones = [];
    
    angular.forEach($scope.desplazamientos_x, function(value_x, key_X) {
        angular.forEach($scope.desplazamientos_y, function(value_y, key_Y) {
            var restriccion = {
                desplazamiento_x: value_x.id,
                desplazamiento_y: value_y.id
            };
            $scope.restricciones.push(restriccion);
        });
    });
    
    $scope.setRestricciones = function() {
        angular.forEach($scope.restricciones, function(value, key) {
            if (value.desplazamiento_x == value.desplazamiento_y) {
                value.valor = true;
                $scope.restricciones[key] = value;
            }
        });
        RestriccionesService.saveMany($scope.restricciones, function(data) {
            $scope.$parent.actualizarMessage(data.message);
            $("#mdlRutas").modal('toggle');
        })
    }
});
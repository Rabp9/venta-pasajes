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
        RestriccionesService.saveMany($scope.restricciones, function(data) {
            console.log(data);
        })
    }
});
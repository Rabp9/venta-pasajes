var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("SetRestriccionesController", function($scope, RestriccionesService) {
    $scope.desplazamientos_x = $scope.$parent.ruta_selected.detalle_desplazamientos;
    $scope.desplazamientos_y = $scope.$parent.ruta_selected.detalle_desplazamientos;
    $scope.restricciones = [];
    
    $scope.list = function() {
        angular.forEach($scope.desplazamientos_x, function(value_x, key_X) {
            angular.forEach($scope.desplazamientos_y, function(value_y, key_Y) {
                var restriccion = {
                    desplazamiento_x: value_x.id,
                    desplazamiento_y: value_y.id
                };
                $scope.restricciones.push(restriccion);
            });
        });
        
        RestriccionesService.getValues({restricciones: $scope.restricciones}, function(data) {
            $scope.restricciones = data.restricciones;
            
            if ($scope.restricciones[0].id) {
                angular.forEach($scope.restricciones, function(restriccion, k_restriccion) {
                    if (restriccion.valor == '1') {
                        $scope.restricciones[k_restriccion].valor = true;
                    } else {
                        $scope.restricciones[k_restriccion].valor = false;
                    }
                });
            }
        });
        
    };
       
    $scope.list();
    
    $scope.setRestricciones = function(id) {
        $('#btnRegistrarRestricciones').addClass("disabled");
        $("#btnRegistrarRestricciones").attr("disabled", true);
        
        angular.forEach($scope.restricciones, function(value, key) {
            if (value.desplazamiento_x == value.desplazamiento_y) {
                value.valor = true;
                $scope.restricciones[key] = value;
            }
        });
        
        RestriccionesService.saveMany($scope.restricciones, function(data) {
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.fetchDesplazamientos(id);
            $("#mdlRestricciones").modal('toggle');
            
            $('#btnRegistrarRestricciones').removeClass("disabled");
            $("#btnRegistrarRestricciones").attr("disabled", false);
        })
    };
});
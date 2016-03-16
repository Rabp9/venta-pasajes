var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddDetalleDesplazamientosController", function($rootScope, $scope, DetalleDesplazamientosService, AgenciasService, TarifasService) {
    $scope.origen_selected = 0;
    $scope.destino_selected = 0;
    $scope.newDetalleDesplazamiento = new DetalleDesplazamientosService();
    
    $scope.agencias = AgenciasService.get(function() {
        $scope.agencias = $scope.agencias.agencias;
    });
    
    $scope.onSelected = function() {
        TarifasService.findByOrigenDestino({
            origen: $scope.origen_selected, 
            destino: $scope.destino_selected
        }, function(data) {
            if (data.tarifas.length == 1) {
                $scope.tarifaSelected = data.tarifas[0];
            } else {
                console.log("no hay coincidencias");
            }
        });
    }
    
    $scope.addDetalleDesplazamiento = function() {
        $scope.newDetalleDesplazamiento.ruta_id = $scope.$parent.ruta_selected.id;
        $scope.newDetalleDesplazamiento.tarifa_id = $scope.tarifaSelected.id;
        DetalleDesplazamientosService.save($scope.newDetalleDesplazamiento, function() {
            $("#mdlRutas").modal('toggle');
            $scope.newDetalleDesplazamiento = new DetalleDesplazamientosService();
            $scope.$parent.loadDesplazamientos($scope.$parent.ruta_selected.id);
        });
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddDetalleDesplazamientosController", function($scope, DetalleDesplazamientosService, AgenciasService, DesplazamientosService) {
    $scope.origen_selected = 0;
    $scope.destino_selected = 0;
    $scope.newDetalleDesplazamiento = new DetalleDesplazamientosService();
    
    $scope.agencias = AgenciasService.get(function() {
        $scope.agencias = $scope.agencias.agencias;
    });
    
    $scope.onSelected = function() {
        $scope.loading = true;
        DesplazamientosService.findByOrigenDestino({
            origen: $scope.origen_selected, 
            destino: $scope.destino_selected
        }, function(data) {
            $scope.loading = false;
            if (data.desplazamientos.length == 1) {
                $scope.desplazamiento = data.desplazamientos[0];
            } else {
                $scope.desplazamiento = null;
            }
        });
    }
    
    $scope.addDetalleDesplazamiento = function() {
        $('#btnRegistrarDesplazamiento').addClass('disabled');
        $('#btnRegistrarDesplazamiento').prop('disabled', true);
        
        $scope.newDetalleDesplazamiento.ruta_id = $scope.$parent.ruta_selected.id;
        $scope.newDetalleDesplazamiento.desplazamiento_id = $scope.desplazamiento.id;
        DetalleDesplazamientosService.save($scope.newDetalleDesplazamiento, function(data) {
            $("#mdlDesplazamientos").modal('toggle');
            $scope.newDetalleDesplazamiento = new DetalleDesplazamientosService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.fetchDesplazamientos($scope.$parent.ruta_selected.id);
            
            $('#btnAddDesplazamientos').removeClass("disabled");
            $("#btnAddDesplazamientos").attr("disabled", false);
        });
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("PasajesController", function($scope, AgenciasService, ProgramacionesService, BusAsientosService, $filter) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.bus_asientos_selected = [];
    
    $scope.agencias = AgenciasService.get(function() {
        $scope.agencias = $scope.agencias.agencias;
    });
    
    $scope.onSearchChange = function() {
        if ($scope.fecha == null) {
            return;
        }
        if ($scope.origen_selected == null) {
            return;
        }
        if ($scope.destino_selected == null) {
            return;
        }
        $scope.searching = true;
        var fecha = $filter("date")($scope.fecha, "yyyy-MM-dd");
        
        $scope.loading = true;
        ProgramacionesService.getByFechaByOrigenByDestino({
            fecha: fecha,
            origen: $scope.origen_selected,
            destino: $scope.destino_selected
        }, function(data) {
            $scope.programaciones = data.programaciones;
            $scope.loading = false;
        });
    }
    
    $scope.onProgramacionSelect = function() {
        ProgramacionesService.get({id: $scope.programacion_id_selected}, function(data) {
            $scope.programacion_selected = data.programacion;
        });
    }
    
    $scope.showBusAsiento = function(bus_asiento_id) {
        BusAsientosService.get({id: bus_asiento_id}, function(data) {
            $scope.bus_asientos_selected.push(data.busAsiento);
        });
    }
});
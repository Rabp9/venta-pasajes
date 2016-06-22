var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("PasajesController", function($scope, AgenciasService, 
    ProgramacionesService, BusAsientosService, DetalleDesplazamientosService, 
    PersonasService, $filter
) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.pasajes = [];
    $scope.dnis = [];
    $scope.personas = [];
    
    $scope.agencias = AgenciasService.get(function() {
        $scope.agencias = $scope.agencias.agencias;
    });
    
    $scope.onSearchChange = function() {
        if ($scope.origen_selected == null) {
            return;
        }
        if ($scope.destino_selected == null) {
            return;
        }
        $scope.searching = true;
        var fecha = $filter("date")($scope.fecha, "yyyy-MM-dd");
        
        ProgramacionesService.getByFechaByOrigenByDestino({
            fecha: fecha,
            origen: $scope.origen_selected,
            destino: $scope.destino_selected
        }, function(data) {
            $scope.programaciones = data.programaciones;
            $scope.searching = false;
        });
    }
    
    $scope.onProgramacionSelect = function(programacion_id_selected) {
        ProgramacionesService.get({id: programacion_id_selected}, function(data) {
            $scope.programacion_selected = data.programacion;
        });
    }
    
    $scope.showBusAsiento = function(bus_asiento_id) {
        BusAsientosService.get({id: bus_asiento_id}, function(data) {
            var pasaje = {
                busAsiento: data.busAsiento,
                bus_asiento_id: data.busAsiento.id,
                programacion: $scope.programacion_selected,
                programacion_id: $scope.programacion_selected.id
            }
            console.log(pasaje);
            $scope.pasajes.push(pasaje);
        });
    }
    
    $scope.onKupDni = function(index) {
        PersonasService.findByDni({dni: $scope.dnis[index]}, function(data) {
            if(data.persona !== null) {
                $scope.personas[index] = data.persona;
                $scope.pasajes[index].persona = data.persona;
                $scope.pasajes[index].persona_id = data.persona.id;
            }
        });
    }
});
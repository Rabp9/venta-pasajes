var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("PasajesController", function($scope, AgenciasService, 
    ProgramacionesService, BusAsientosService, DetalleDesplazamientosService, 
    PersonasService, DesplazamientosService, PasajesService, $filter
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
            if ($scope.programaciones) {
                DesplazamientosService.getByOrigenAndDestino({
                    origen: $scope.origen_selected,
                    destino: $scope.destino_selected
                }, function(data) {
                    $scope.desplazamiento = data.desplazamiento;
                })
            }
            $scope.searching = false;
        });
    }
    
    $scope.onProgramacionSelect = function(programacion_id_selected) {
        ProgramacionesService.get({id: programacion_id_selected}, function(data) {
            console.log(data.programacion);
            $scope.programacion_selected = data.programacion;
            DetalleDesplazamientosService.getByRutaAndDesplazamiento({
                ruta_id: $scope.programacion_selected.ruta_id,
                desplazamiento_id: $scope.desplazamiento.id
            }, function(data) {
                $scope.detalle_desplazamiento = data.detalleDesplazamiento;
            })
        });
    }
    
    $scope.showBusAsiento = function(bus_asiento_id) {
        // comprobar si el asiento no ha sido seleccionado anteriormente
        
        BusAsientosService.get({id: bus_asiento_id}, function(data) {
            var pasaje = {
                busAsiento: data.busAsiento,
                bus_asiento_id: data.busAsiento.id,
                programacion: $scope.programacion_selected,
                programacion_id: $scope.programacion_selected.id,
                detalleDesplazamiento: $scope.detalle_desplazamiento,
                detalle_desplazamiento_id: $scope.detalle_desplazamiento.id
            }
            $scope.pasajes.push(pasaje);
        });
    }
    
    $scope.onKupDni = function(index) {
        PersonasService.findByDni({dni: $scope.dnis[index]}, function(data) {
            if (data.persona !== null) {
                $scope.pasajes[index].persona = data.persona;
                $scope.pasajes[index].persona_id = data.persona.id;
            }
        });
    }
    
    $scope.buy = function(pasaje, index) {
        console.log(index);
        // $("#btnRegistrar").addClass("disabled");
        delete pasaje.persona;
        delete pasaje.busAsiento;
        delete pasaje.programacion;
        delete pasaje.detalleDesplazamiento;
        console.log(pasaje);
        PasajesService.save(pasaje, function(data) {
            console.log(data);
            $("#frmPasaje" + index).parent().fadeOut(500);
        });
    }
});
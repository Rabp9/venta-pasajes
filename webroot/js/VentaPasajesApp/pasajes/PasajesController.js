var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("PasajesController", function($scope, AgenciasService, 
    ProgramacionesService, BusAsientosService, DetalleDesplazamientosService, 
    PersonasService, DesplazamientosService, PasajesService, $filter, $window, TarifasService
) {
    var date = new Date();
    
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.pasajes = [];
    $scope.dnis = [];
    $scope.personas = [];
    $scope.fecha = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
    
    
    $("#txtFecha").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onSelect: function(dateText) {
            $scope.fecha = dateText;
            $scope.$apply();
            $scope.onSearchChange();
        }
    });
        
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
            $scope.programacion_selected = data.programacion;
            DetalleDesplazamientosService.getByRutaAndDesplazamiento({
                ruta_id: $scope.programacion_selected.ruta_id,
                desplazamiento_id: $scope.desplazamiento.id
            }, function(data) {
                $scope.detalle_desplazamiento = data.detalleDesplazamiento;
                angular.forEach($scope.programacion_selected.bus.bus_pisos, function(v_piso, k_piso) {
                    angular.forEach(v_piso.bus_asientos, function(v_asiento, k_asiento) {
                        // 1. Saber si esta comprado
                        // 2. Si la restricción me permite comprar el mismo
                        
                        PasajesService.getEstado({
                            bus_asiento_id: v_asiento.id,
                            programacion_id: $scope.programacion_selected.id,
                            detalle_desplazamiento_id: $scope.detalle_desplazamiento.id
                        }, function(data) {
                            $scope.programacion_selected.bus.bus_pisos[k_piso].bus_asientos[k_asiento].estado = data.estado;
                        });
                    });
                });
                TarifasService.getTarifas({
                    desplazamiento_id: $scope.desplazamiento.id, 
                    servicio_id: $scope.programacion_selected.servicio_id
                }, function(data) {
                    $scope.precio_min = data.tarifa.precio_min;
                    $scope.precio_max = data.tarifa.precio_max
                });
                
                var asientosPreSelected = $scope.pasajes.map(function(pasaje) { 
                    var pasaje = {
                        nro_piso: pasaje.busAsiento.bus_piso.nro_piso,
                        nro_asiento: pasaje.busAsiento.nro_asiento
                    }
                    return pasaje; 
                });
                angular.forEach(asientosPreSelected, function(value, key) {
                    $('#asiento' + value.nro_piso + value.nro_asiento ).addClass('asientoSelected');;
                });
            });
        });
    }
    
    $scope.showBusAsiento = function(bus_asiento_id, estado) {
        // comprobar si el asiento no ha sido seleccionado anteriormente
        if (estado == "disponible") {
            if ($scope.pasajes.map(function(pasaje) { return pasaje.bus_asiento_id; }).indexOf(bus_asiento_id) < 0) {
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
                    $('#asiento' + data.busAsiento.bus_piso.nro_piso + data.busAsiento.nro_asiento).addClass('asientoSelected');
                });
            } else {
                alert('Este asiento ya esta seleccionado');
            }
        } else {
            alert("Este asiento ya está reservado");
        }
    }
    
    $scope.buy = function(pasaje, index) {
        if (pasaje.persona == undefined) {
            alert('Seleccione una persona');
            return;
        }
        if (pasaje.valor == undefined) {
            alert('Ingrese un valor al pasaje');
            return;
        }
        $('#btnComprar' + index).addClass('disabled');
        $('#btnComprar' + index).prop('disabled', true);
        
        var programacion_id = pasaje.programacion.id;
        delete pasaje.persona;
        delete pasaje.busAsiento;
        delete pasaje.programacion;
        delete pasaje.detalleDesplazamiento;
        PasajesService.save(pasaje, function(data) {
            $("#frmPasaje" + index).parent().parent().fadeOut(500);
            $scope.onProgramacionSelect(programacion_id);
            $window.open('#/pasajes/' + data.pasaje.id, '_blank');
            $scope.pasajes.splice(index, 1);
            
            $('#btnComprar' + index).removeClass('disabled');
            $('#btnComprar' + index).prop('disabled', false);
        });
    }
    
    $scope.cerrarPasaje = function($index) {
        var nro_piso = $scope.pasajes[$index].busAsiento.bus_piso.nro_piso;
        var nro_asiento = $scope.pasajes[$index].busAsiento.nro_asiento;
        $('#asiento' + nro_piso + nro_asiento ).removeClass('asientoSelected');
        $scope.pasajes.splice($index, 1);
    };
    
    $scope.searchCliente = function(index) {
        PersonasService.findByDni({dni: $scope.dnis[index]}, function(data) {
            if (data.persona !== null) {
                $scope.pasajes[index].persona = data.persona;
                $scope.pasajes[index].persona_id = data.persona.id;
            }
        });
    };
});
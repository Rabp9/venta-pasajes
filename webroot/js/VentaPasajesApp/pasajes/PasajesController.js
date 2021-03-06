var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("PasajesController", function($scope, AgenciasService, 
    ProgramacionesService, BusAsientosService, DetalleDesplazamientosService, 
    PersonasService, DesplazamientosService, PasajesService, $filter, $window, TarifasService,
    ClientesService, $rootScope
) {
    var date = new Date();
    
    $scope.construct = function() {
        $scope.searching = false;
        $scope.reverse = false;
        $scope.predicate = "id";
        $scope.pasajes = [];
        $scope.dnis = [];
        $scope.personas = [];
        $scope.fecha = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
    };

    $scope.construct();

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
    
    $scope.openClientesModal = function() {
        $("#mdlClientes").modal("toggle");
    };
      
    $("#mdlClientes").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $(".btn-add-cliente").removeClass("disabled");
            $(".btn-add-cliente").attr("disabled", false);
            $scope.modalClientesUrl = "";
        });
    });
    
    $scope.contextMenu = function(bus_asiento_id, bus_asiento_estado, $event, bus_asiento) {
        if (bus_asiento_estado == 'restringido') {
            var alter = 0;
            if ($event.pageY > document.body.clientHeight) {
                if ($($event.target).attr('class') == 'draggable  restringido') {
                    alter = -228; // Comprado
                } else if($($event.target).attr('class') == 'draggable  reservado') {
                    alter = -255; // Reservado
                }
            } else {
                alter = -122;
            }
            $("#cmnPasajes").css({
                display: "block",
                left: $event.pageX,
                top: $event.pageY + alter
            });
            $scope.busPrintSelected = bus_asiento_id;
            $scope.busRealSelected = bus_asiento;
            
            PasajesService.getData({
                bus_asiento_id: bus_asiento_id,
                programacion_id: $scope.programacion_selected.id,
                detalle_desplazamiento_id: $scope.detalle_desplazamiento.id
            }, function(data) {
                if (data.pasaje) {
                    $scope.showDetallesOption = true;
                } else {
                    $scope.showDetallesOption = false;
                }
                if(data.pasaje.estado_id == 6) {
                    $scope.showConfirmarCompraOption = true;
                } else {
                    $scope.showConfirmarCompraOption = false;
                }
            });
        }
    }
   
    $("body").click(function() {
        $("#cmnPasajes").css({
            display: 'none'
        });
    })
    
    $scope.agencias = AgenciasService.get(function() {
        $scope.agencias = $scope.agencias.agencias;
        if ($rootScope.user.user_detalle != undefined) {
            $scope.origen_selected = $rootScope.user.user_detalle.agencia_id;
        }
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
    };
    
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
                        
                        PasajesService.getData({
                            bus_asiento_id: v_asiento.id,
                            programacion_id: $scope.programacion_selected.id,
                            detalle_desplazamiento_id: $scope.detalle_desplazamiento.id
                        }, function(data) {
                            $scope.programacion_selected.bus.bus_pisos[k_piso].bus_asientos[k_asiento].pasaje = data.pasaje;
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
                BusAsientosService.get({id: bus_asiento_id}, function(data_busAsiento) {
                    PasajesService.getNextNroDoc(function(data_pasaje) {
                        var nro_doc = data_pasaje.nro_doc;
                        // nro_doc = nro_doc + $scope.pasajes.length;
                        var pasaje = {
                            busAsiento: data_busAsiento.busAsiento,
                            bus_asiento_id: data_busAsiento.busAsiento.id,
                            programacion: $scope.programacion_selected,
                            programacion_id: $scope.programacion_selected.id,
                            detalleDesplazamiento: $scope.detalle_desplazamiento,
                            detalle_desplazamiento_id: $scope.detalle_desplazamiento.id,
                            tipodoc: 'boleta',
                            nro_doc: nro_doc,
                            estado_id: 5
                        }
                        $scope.pasajes.push(pasaje);
                        $('#asiento' + data_busAsiento.busAsiento.bus_piso.nro_piso + data_busAsiento.busAsiento.nro_asiento).addClass('asientoSelected');
                    });
                });
            } else {
                alert('Este asiento ya esta seleccionado');
            }
        } else {
            alert("Este asiento ya está reservado");
        }
    };
    
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
        
        if ($rootScope.user.user_detalle.agencia_id) {
            pasaje.agencia_id = $rootScope.user.user_detalle.agencia_id;
        }
        pasaje.user_id = $rootScope.user.id;
        PasajesService.save(pasaje, function(data) {
            $("#frmPasaje" + index).parent().parent().fadeOut(500);
            $scope.onProgramacionSelect(programacion_id);
            $window.open('pasajes/' + data.pasaje.id, '_blank', 'Boleto de Viaje');
            $scope.pasajes.splice(index, 1);
            
            $('#btnComprar' + index).removeClass('disabled');
            $('#btnComprar' + index).prop('disabled', false);
            
            angular.forEach($scope.pasajes, function(value, key) {
                $scope.pasajes[key].nro_doc += 1;
            })
        });
    };
    
    $scope.cerrarPasaje = function($index) {
        var nro_piso = $scope.pasajes[$index].busAsiento.bus_piso.nro_piso;
        var nro_asiento = $scope.pasajes[$index].busAsiento.nro_asiento;
        $('#asiento' + nro_piso + nro_asiento ).removeClass('asientoSelected');
        $scope.pasajes.splice($index, 1);
    };
    
    $scope.searchPersona = function(index) {
        if ($scope.dnis[index]) {
            PersonasService.findByDni({dni: $scope.dnis[index]}, function(data) {
                if (data.persona !== null) {
                    $scope.pasajes[index].persona = data.persona;
                    $scope.pasajes[index].persona_id = data.persona.id;
                }
            });
        }
    };
    
    $scope.searchCliente = function(index) {
        ClientesService.findByRuc({ruc: $scope.pasajes[index].ruc}, function(data) {
            $scope.pasajes[index].cliente = data.cliente;
        });
    };
    
    $scope.addPreCliente = function(index) {
        $("#btnAddCliente" + index).addClass("disabled");
        $("#btnAddCliente" + index).attr("disabled", true);
        $scope.modalClientesUrl = VentaPasajesApp.path_location + "clientes/add";
    };
    
    $scope.print = function() {
        var programacion_id = $scope.programacion_selected.id;
        var detalle_desplazamiento_id = $scope.detalle_desplazamiento.id;
        var bus_asiento_id = $scope.busPrintSelected;
        
        PasajesService.getForPrint({
            programacion_id: programacion_id,
            detalle_desplazamiento_id: detalle_desplazamiento_id,
            bus_asiento_id: bus_asiento_id
        }, function(data) {
            $window.open('pasajes/' + data.pasaje.id, '_blank', 'Boleto de Viaje');
        });
    };
    
    $scope.cancel = function() {
        if (confirm('¿Está seguro de cancelar la este pasaje?')) {
            var programacion_id = $scope.programacion_selected.id;
            var detalle_desplazamiento_id = $scope.detalle_desplazamiento.id;
            var bus_asiento_id = $scope.busPrintSelected;

            PasajesService.cancel({
                programacion_id: programacion_id,
                detalle_desplazamiento_id: detalle_desplazamiento_id,
                bus_asiento_id: bus_asiento_id
            }, function(data) {
                $scope.message = data.message;
                // $scope.busRealSelected.estado_id = 1;
                $scope.onProgramacionSelect(programacion_id);
            });
        }
    };
    
    $scope.addPersona = function() {
        $("#btnAddPersona").addClass("disabled");
        $("#btnAddPersona").prop("disabled", true);
        $scope.modalUrlPersona = VentaPasajesApp.path_location + "personas/add";
    };
    
    $scope.openPersonasModal = function() {
        $("#mdlPersonas").modal("toggle");
    }
    
    $("#mdlPersonas").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAddPersona").removeClass("disabled");
            $("#btnAddPersona").attr("disabled", false);
            $scope.modalUrlPersona = "";
        });
    });
    
    $scope.showData = function(pasaje) {
        if (pasaje != null) {
            var enter = "\n";
            var codBoleta = 'Código Boleta: ' + pasaje.cod_boleto;
            var pasajero = 'Pasajero: ' + pasaje.persona.full_name;
            var dni = 'DNI: ' + pasaje.persona.dni;
            var fechahora_prog = 'Fecha: ' + pasaje.programacion.fecha_prog;
            var valor = 'Valor: ' + pasaje.valor_formatted;
            var estado = 'Estado: ' + pasaje.estado.descripcion;
            
            return codBoleta + enter + pasajero + enter + dni + enter + fechahora_prog + enter + valor + enter + estado;
        } else {
            return "";
        }
    }
    
    $scope.showEstado = function(estado, pasaje) {
        if (pasaje != null) {
            if (pasaje.estado.id == 6) {
                return 'reservado';
            } else {
                return estado;
            }
        } else {
            return estado;
        }
    };
    
    $scope.showDetallesWindow = function() {
        var programacion_id = $scope.programacion_selected.id;
        var detalle_desplazamiento_id = $scope.detalle_desplazamiento.id;
        var bus_asiento_id = $scope.busPrintSelected;
        
        PasajesService.getForPrint({
            programacion_id: programacion_id,
            detalle_desplazamiento_id: detalle_desplazamiento_id,
            bus_asiento_id: bus_asiento_id
        }, function(data) {
            $scope.modalUrlPasaje = VentaPasajesApp.path_location + "pasajes/detalle/" + data.pasaje.id;
        });
    };
    
    $scope.openPasajeDetalleModal = function() {
        $("#mdlDetallePasaje").modal("toggle");
    }
    
    $("#mdlDetallePasaje").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $scope.modalUrlPasaje = "";
        });
    });
    
    $scope.confirmarCompra = function() {
        if (confirm('¿Está seguro de confirmar esta reservación?')) {
            var programacion_id = $scope.programacion_selected.id;
            var detalle_desplazamiento_id = $scope.detalle_desplazamiento.id;
            var bus_asiento_id = $scope.busPrintSelected;
            
            PasajesService.confirmarCompra({
                programacion_id: programacion_id,
                detalle_desplazamiento_id: detalle_desplazamiento_id,
                bus_asiento_id: bus_asiento_id
            }, function(data) {
                $scope.message = data.message;
                $scope.onProgramacionSelect(programacion_id);
            });
        }
    }
    
    $scope.blurDni = function(dni) {
        PersonasService.findByDni({dni: dni}, function(data) {
            if (data.persona === null) {
                $scope.response = {
                    type: 'success',
                    message: 'DNI disponible'
                };
            } else {
                $scope.response = {
                    type: 'error',
                    message: 'El DNI no está disponible'
                };
            }
        });
    }
});
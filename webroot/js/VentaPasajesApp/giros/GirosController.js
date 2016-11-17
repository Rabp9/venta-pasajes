var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("GirosController", function($scope, AgenciasService, $filter, 
    GirosService, TipoProductosService, PersonasService, DesplazamientosService, ProgramacionesService,
    $window, $rootScope
) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    var date = new Date();
    
    $scope.construct = function() {
        $scope.newGiro = {};
        $scope.newGiro.preFecha = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
        $scope.giros_selected = [];
        $scope.giros_asignados_selected = [];
        $scope.loading_programaciones = false;
        $scope.newGiro.condicion = 'cancelado';
        $scope.remitente_dni = '';
        $scope.destinatario_dni = '';
        $scope.remitente = undefined;
        $scope.destinatario = undefined;
        $scope.origen_selected = null;
        $scope.destino_selected = null;
        $scope.tipo_asignacion = 'telefonica';
        
        GirosService.getNextNroDoc(function(data) {
            $scope.newGiro.nro_doc = data.nro_doc;
        });
    }
    
    $scope.construct();
          
    $("#mdlAsignarGiros").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAsignar").removeClass("disabled");
            $("#btnAsignar").attr("disabled", false);
            $("#btnReasignar").removeClass("disabled");
            $("#btnReasignar").attr("disabled", false);
        });
    });
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    };
    
    $scope.listGiros = function() {
        $scope.loading = true;
        GirosService.getPendientes(function(data) {
            $scope.giros = data.giros;
            $scope.loading = false;
        });
        
        $scope.loading_list = true;
        GirosService.getSinEntregar(function(data) {
            $scope.giros_list = data.giros;
            $scope.loading_list = false;
        })
    };
    
    $("#txtFechaGiros").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
    
    AgenciasService.get(function(data) {
        $scope.agencias = data.agencias;
        if ($rootScope.user.user_detalle != undefined) {
            $scope.origen_selected = $rootScope.user.user_detalle.agencia_id;
        }
    });
    
    PersonasService.get(function(data) {
        $scope.personas = data.personas; 
    });
    
    TipoProductosService.get(function(data) {
        $scope.tipo_productos = data.tipoProductos; 
    });
    
    $scope.buscarRemitente = function() {
        if (!$scope.remitente_dni) {
            alert("Ingrese un dni en el remitente");
            return;
        }
        $("#btnBuscarRemitente").addClass("disabled");
        $("#btnBuscarRemitente").attr("disabled", true);
        PersonasService.findByDni({dni: $scope.remitente_dni}, function(data) {
            $scope.remitente = data.persona;
            $("#btnBuscarRemitente").removeClass("disabled");
            $("#btnBuscarRemitente").attr("disabled", false);
        });
    }
    
    $scope.buscarDestinatario = function() {
        if (!$scope.destinatario_dni) {
            alert("Ingrese un dni en el destinatario");
            return;
        }
        $("#btnBuscarDestinatario").addClass("disabled");
        $("#btnBuscarDestinatario").attr("disabled", true);
        PersonasService.findByDni({dni: $scope.destinatario_dni}, function(data) {
            $scope.destinatario = data.persona;
            $("#btnBuscarDestinatario").removeClass("disabled");
            $("#btnBuscarDestinatario").attr("disabled", false);
        });
    }
    
    $scope.saveGiro = function() {
        // Validacion
        if ($scope.origen_selected === $scope.destino_selected) {
            alert('El origen y el destino no pueden ser los mismos');
            return;
        }
        
        if ($scope.remitente == null) {
            alert('Seleecione un remitente');
            return;
        }
        
        if ($scope.destinatario == null) {
            alert('Seleecione un destinatario');
            return;
        }
                
        if ($scope.remitente.id === $scope.destinatario.id) {
            alert('El remitente y el destinatario no pueden ser los mismos');
            return;
        }
        
        if (confirm('¿Está seguro de registrar el giro?')) {
            $("#btnRegistrarGiro").addClass("disabled");
            $("#btnRegistrarGiro").attr("disabled", true);
            $scope.newGiro.remitente = $scope.remitente.id;
            $scope.newGiro.destinatario = $scope.destinatario.id;
            $scope.newGiro.estado_id = 1;
            $scope.newGiro.fecha = $filter("date")($scope.newGiro.preFecha, "yyyy-MM-dd HH:mm:ss");

            DesplazamientosService.getByOrigenAndDestino({
                origen: $scope.origen_selected,
                destino: $scope.destino_selected
            }, function(data) {
                if (data.desplazamiento == null) {
                    alert("No existe un desplazamiento definido entre el origen y el destino");
                    alert("No fue posible registrar el giro");
                    
                    $("#btnRegistrarGiro").removeClass("disabled");
                    $("#btnRegistrarGiro").attr("disabled", false);
                    return;
                }
                $scope.newGiro.desplazamiento_id = data.desplazamiento.id;

                $scope.newGiro.user_id = $rootScope.user.id;
                GirosService.save($scope.newGiro, function(data) {
                    $scope.message = data.message;
                    if ($scope.message.type == 'success') {                    
                        $('#ulTabs li:eq(1) a').tab('show');
                        $scope.construct();
                        $scope.listGiros();
                        $window.open('giros/' + data.message.id, '_blank');
                    }
                    $("#btnRegistrarGiro").removeClass("disabled");
                    $("#btnRegistrarGiro").attr("disabled", false);
                });
            });
        }
    };
    
    $scope.asignar = function() {
        $("#btnAsignar").addClass("disabled");
        $("#btnAsignar").attr("disabled", true);
        
        if ($scope.giros_selected.length != 0) {
            $("#mdlAsignarGiros").modal("toggle");
            $scope.loading_programaciones = true;
            ProgramacionesService.get(function(data) {
                $scope.programaciones_filtradas = data.programaciones;
                $scope.loading_programaciones = false;
                GirosService.getOrigenDestino({ids: $scope.giros_selected}, function(data) {
                    $scope.origen_selected = data.origen_id;
                    $scope.destino_selected = data.destino_id;
                    $scope.onSearchChange();
                });
            });
            $scope.asignando = true;
        } else {
            alert("Seleccione uno o más giros");
            
            $("#btnAsignar").removeClass("disabled");
            $("#btnAsignar").attr("disabled", false);
        }
    }
    
    $scope.reasignar = function() {
        $("#btnReasignar").addClass("disabled");
        $("#btnReasignar").attr("disabled", true);
        
        if ($scope.giros_asignados_selected.length != 0) {
            $("#mdlAsignarGiros").modal("toggle");
            $scope.loading_programaciones = true;
            ProgramacionesService.get(function(data) {
                $scope.programaciones_filtradas = data.programaciones;
                $scope.loading_programaciones = false;
            });
            $scope.asignando = false;
        } else {
            alert("Seleccione uno o más giros");
            
            $("#btnReasignar").removeClass("disabled");
            $("#btnReasignar").attr("disabled", false);
        }
    }
    
    $scope.registrarAsignacion = function(programacion_id) {
        $('.btn-asignar').addClass('disabled');
        $('.btn-asignar').attr('disabled', true);
        
        var giros_por_asignar = [];
        if ($scope.asignando) {
            giros_por_asignar = $scope.giros_selected;
        } else {
            giros_por_asignar = $scope.giros_asignados_selected;
        }
        
        if ($scope.tipo_asignacion == 'telefonica') {
            GirosService.llamar({
               giros: giros_por_asignar,
               entrega: $scope.entrega
            }, function(data) {
                $scope.message = data.message;
                $("#mdlAsignarGiros").modal("toggle");
                $scope.listGiros();

                $("#btnAsignar").removeClass("disabled");
                $("#btnAsignar").attr("disabled", false);
                
                $("#btnReasignar").removeClass("disabled");
                $("#btnReasignar").attr("disabled", false);
                
                $('.btn-asignar').removeClass('disabled');
                $('.btn-asignar').attr('disabled', false);

                $scope.entrega = '';
                $scope.giros_selected = [];
                $scope.giros_asignados_selected = [];
                $scope.check_all_list = false;
            });
        } else if ($scope.tipo_asignacion == 'programacion') {
            GirosService.asignar({
                giros: giros_por_asignar,
                programacion_id: programacion_id
            }, function(data) {
                $scope.message = data.message;
                $("#mdlAsignarGiros").modal("toggle");
                $scope.listGiros();

                $("#btnAsignar").removeClass("disabled");
                $("#btnAsignar").attr("disabled", false);
                
                $("#btnReasignar").removeClass("disabled");
                $("#btnReasignar").attr("disabled", false);
                
                $('.btn-asignar').removeClass('disabled');
                $('.btn-asignar').attr('disabled', false);
                
                $scope.giros_selected = [];
                $scope.giros_asignados_selected = [];
                $scope.check_all_list = false;
            });
        }
    }
    
    $scope.onSearchChange = function() {
        $scope.loading_programaciones = true;
        if ($scope.origen_selected === null && $scope.destino_selected === null) {
            ProgramacionesService.get(function(data) {
                $scope.programaciones_filtradas = data.programaciones;
                $scope.loading_programaciones = false;
            });
        } else {
            if ($scope.origen_selected == null) {
                $scope.programaciones_filtradas = [];
                $scope.loading_programaciones = false;
                return;
            }
            if ($scope.destino_selected == null) {
                $scope.programaciones_filtradas = [];
                $scope.loading_programaciones = false;
                return;
            }
            ProgramacionesService.getByFechaByOrigenByDestino({
                fecha: null,
                origen: $scope.origen_selected,
                destino: $scope.destino_selected
            }, function(data) {
                $scope.programaciones_filtradas = data.programaciones;
                $scope.loading_programaciones = false;
            });
        }
    };
    
    $scope.printBoleta = function(id) {
        $window.open('giros/' + id, '_blank');
    };
    
    $scope.cancelarAsignacion = function(id) {
        if (confirm('¿Está seguro de cancelar la asignación?')) {
            GirosService.cancelarAsignacion({id: id}, function(data) {
                $scope.message = data.message;
                $scope.listGiros();
            });
        }
    };
    
    $scope.registrarEntrega = function(id) {
        if (confirm('¿Está seguro de registrar la entrega de este giro?')) {
            GirosService.registrarEntrega({id: id}, function(data) {
                $scope.message = data.message;
                $scope.listGiros();
            });
        }
    };
    
    $scope.listGiros();
    
    $scope.filter_giros = function (item) {
        var origen = $scope.search_origen ? item.desplazamiento.AgenciaOrigen.id == $scope.search_origen : true;
        var destino = $scope.search_destino ? item.desplazamiento.AgenciaDestino.id == $scope.search_destino : true;
        var dni1 = $scope.search_dni ? item.personaRemitente.dni.search($scope.search_dni) >= 0 : true;
        var dni2 = $scope.search_dni ? item.personaDestinatario.dni.search($scope.search_dni) >= 0 : true;
        var dni = dni1 || dni2;
        var asignado = $scope.search_asignado ? item.asignado.toLowerCase().search($scope.search_asignado.toLowerCase()) >= 0 : true;

        return origen && destino && dni && asignado;
    };
    
    $scope.registrarEntregaMany = function() {
        $("#btnRegistrarEntrega").addClass("disabled");
        $("#btnRegistrarEntrega").attr("disabled", true);
        
        if ($scope.giros_asignados_selected.length != 0) {
            if (confirm('¿Está seguro de registrar la entrega de estos giros?')) {
                GirosService.registrarEntregaMany({ids: $scope.giros_asignados_selected}, function(data) {
                    $scope.message = data.message;
                    $scope.listGiros();
                    
                    $scope.giros_asignados_selected = [];
                    $scope.check_all_asignados_list = false;
                    
                    $("#btnRegistrarEntrega").removeClass("disabled");
                    $("#btnRegistrarEntrega").attr("disabled", false);
                });
            } else {
                $("#btnRegistrarEntrega").removeClass("disabled");
                $("#btnRegistrarEntrega").attr("disabled", false);
            }
        } else {
            alert("Seleccione uno o más giros");
            
            $("#btnRegistrarEntrega").removeClass("disabled");
            $("#btnRegistrarEntrega").attr("disabled", false);
        }
    }
    
    $scope.cancelarMany = function() {
        $("#btnCancelar").addClass("disabled");
        $("#btnCancelar").attr("disabled", true);
        
        if ($scope.giros_asignados_selected.length != 0) {
            if (confirm('¿Está seguro de cancelar los giros?')) {
                GirosService.cancelarAsignacionMany({ids: $scope.giros_asignados_selected}, function(data) {
                    $scope.message = data.message;
                    $scope.listGiros();
                    
                    $scope.giros_asignados_selected = [];
                    $scope.check_all_asignados_list = false;
                    
                    $("#btnCancelar").removeClass("disabled");
                    $("#btnCancelar").attr("disabled", false);
                });
            } else {
                $("#btnCancelar").removeClass("disabled");
                $("#btnCancelar").attr("disabled", false);
            }
        } else {
            alert("Seleccione uno o más giros");
            
            $("#btnCancelar").removeClass("disabled");
            $("#btnCancelar").attr("disabled", false);
        }
    }
    
    $scope.check_all_list_event = function() {
        if ($scope.check_all_list) {
            var ids = [];
            angular.forEach($scope.filteredGiros, function(value, key) {
                ids.push(value.id);
            });
            $scope.giros_selected = ids;
            $(".giros_selected").prop("checked", true);
        } else {
            $scope.giros_selected = [];
            $(".giros_selected").prop("checked", false);
        }
    }
   
    $scope.check_all_asignados_list_event = function() {
        if ($scope.check_all_asignados_list) {
            var ids = [];
            angular.forEach($scope.filteredGirosList, function(value, key) {
                ids.push(value.id);
            });
            $scope.giros_asignados_selected = ids;
            $(".giros_asignados_selected").prop("checked", true);
        } else {
            $scope.giros_selected = [];
            $(".giros_asignados_selected").prop("checked", false);
        }
    };
    
    $scope.addPersonaR = function() {
        $("#btnNuevoRemitente").addClass("disabled");
        $("#btnNuevoRemitente").prop("disabled", true);
        
        $scope.modalUrlPersonaR = VentaPasajesApp.path_location + "personas/add";
    };
    
    $scope.addPersonaD = function() {
        $("#btnNuevoDestinatario").addClass("disabled");
        $("#btnNuevoDestinatario").prop("disabled", true);
        
        $scope.modalUrlPersonaD = VentaPasajesApp.path_location + "personas/add";
    };
    
    $scope.openPersonasRModal = function() {
        $("#mdlPersonasGR").modal("toggle");
    }
    
    $scope.openPersonasDModal = function() {
        $("#mdlPersonasGD").modal("toggle");
    }
    
    $("#mdlPersonasGR").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnNuevoRemitente").removeClass("disabled");
            $("#btnNuevoRemitente").attr("disabled", false);

            $scope.modalUrlPersonaR = "";
        });
    });
    
    $("#mdlPersonasGD").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnNuevoDestinatario").removeClass("disabled");
            $("#btnNuevoDestinatario").attr("disabled", false);

            $scope.modalUrlPersonaD = "";
        });
    });
    
});
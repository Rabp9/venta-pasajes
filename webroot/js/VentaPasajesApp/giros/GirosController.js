var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("GirosController", function($scope, AgenciasService, $filter, 
    GirosService, TipoProductosService, PersonasService, DesplazamientosService, ProgramacionesService,
    $window
) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    var date = new Date();
    
    $scope.construct = function() {
        $scope.newGiro = {};
        $scope.newGiro.preFecha = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
        $scope.giros_selected = [];
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
    
    $("#txtFecha").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
    
    AgenciasService.get(function(data) {
        $scope.agencias = data.agencias;
    });
    
    PersonasService.get(function(data) {
        $scope.personas = data.personas; 
    });
    
    TipoProductosService.get(function(data) {
        $scope.tipo_productos = data.tipoProductos; 
    });
    
    $scope.buscarRemitente = function() {
        $("#btnBuscarRemitente").addClass("disabled");
        $("#btnBuscarRemitente").attr("disabled", true);
        PersonasService.findByDni({dni: $scope.remitente_dni}, function(data) {
            $scope.remitente = data.persona;
            $("#btnBuscarRemitente").removeClass("disabled");
            $("#btnBuscarRemitente").attr("disabled", false);
        });
    }
    
    $scope.buscarDestinatario = function() {
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
        
        if ($scope.remitente.id === $scope.destinatario.id) {
            alert('El remitente y el destinatario no pueden ser los mismos');
            return;
        }
              
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
            $scope.newGiro.desplazamiento_id = data.desplazamiento.id;
            
            GirosService.save($scope.newGiro, function(data) {
                $scope.message = data.message;
                if ($scope.message.type = 'success') {                    
                    $('#ulTabs li:eq(1) a').tab('show');
                    $scope.construct();
                    $scope.listGiros();
                    $window.open('giros/' + data.message.id, '_blank');
                }
                $("#btnRegistrarGiro").removeClass("disabled");
                $("#btnRegistrarGiro").attr("disabled", false);
            });
        });
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
            });
        } else {
            alert("Seleccione uno o más giros");
            
            $("#btnAsignar").removeClass("disabled");
            $("#btnAsignar").attr("disabled", false);
        }
    }
    
    $scope.registrarAsignacion = function(programacion_id) {
        if ($scope.tipo_asignacion == 'telefonica') {
            GirosService.llamar({
               giros: $scope.giros_selected,
               entrega: $scope.entrega
            }, function(data) {
                $scope.message = data.message;
                $("#mdlAsignarGiros").modal("toggle");
                $scope.listGiros();

                $("#btnAsignar").removeClass("disabled");
                $("#btnAsignar").attr("disabled", false);
            });
        } else if ($scope.tipo_asignacion == 'programacion') {
            GirosService.asignar({
                giros: $scope.giros_selected,
                programacion_id: programacion_id
            }, function(data) {
                $scope.message = data.message;
                $("#mdlAsignarGiros").modal("toggle");
                $scope.listGiros();

                $("#btnAsignar").removeClass("disabled");
                $("#btnAsignar").attr("disabled", false);
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
        var origen = item.desplazamiento.AgenciaOrigen.id == $scope.search_origen;
        var destino = item.desplazamiento.AgenciaDestino.id == $scope.search_destino;
        var dni = item.personaRemitente.dni.search($scope.search_dni) >= 0 || item.personaDestinatario.dni.search($scope.search_dni) >= 0;
        
        if ($scope.search_origen != null && $scope.search_destino != null && $scope.search_dni != null) {
            return origen && destino && dni;
        }
        if ($scope.search_dni != null && $scope.search_origen != null) {
            return dni && origen;
        }
        if ($scope.search_dni != null && $scope.search_origen != null) {
            return dni && destino;
        }
        if ($scope.search_origen != null && $scope.search_destino != null) {
            return origen && destino;
        }
        if ($scope.search_dni != null) {
            return dni;
        }
        if ($scope.search_origen != null) {
            return origen;
        }
        if ($scope.search_destino != null) {
            return destino;
        }
        return true;
    };
});
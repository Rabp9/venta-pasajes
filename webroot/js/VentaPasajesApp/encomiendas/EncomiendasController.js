var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EncomiendasController", function($scope, AgenciasService, $filter, 
    EncomiendasService, TipoProductosService, PersonasService, DesplazamientosService, ProgramacionesService,
    ClientesService,
    $window
) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    var date = new Date();
    
    $scope.construct = function() {
        $scope.newEncomienda = {};
        $scope.newTipoProducto = {};
        $scope.newEncomienda.preFechahora = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
        $scope.newEncomienda.encomiendas_tipos = [];
        $scope.encomiendas_selected = [];
        $scope.loading_programaciones = false;
        $scope.newEncomienda.tipodoc = 'boleta';
        $scope.newEncomienda.condicion = 'cancelado';
        $scope.newEncomienda.cliente = [];
        $scope.newTipoProducto.cantidad = 1;
        $scope.remitente_dni = '';
        $scope.destinatario_dni = '';
        $scope.remitente = undefined;
        $scope.destinatario = undefined;
        $scope.origen_selected = null;
        $scope.destino_selected = null;
        
        EncomiendasService.getNextNroDoc({tipodoc: $scope.newEncomienda.tipodoc}, function(data) {
            $scope.newEncomienda.nro_doc = data.nro_doc;
        });
    }
    
    $scope.construct();
    
    $scope.openModal = function() {
        $("#mdlClientes").modal("toggle");
    };
      
    $("#mdlEncomiendaTipoAdd").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAddDetalleProducto").removeClass("disabled");
            $("#btnAddDetalleProducto").attr("disabled", false);
        });
    });
          
    $("#mdlAsignarEncomiendas").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAsignar").removeClass("disabled");
            $("#btnAsignar").attr("disabled", false);
        });
    });
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    };
    
    $scope.listEncomiendas = function() {
        $scope.loading = true;
        EncomiendasService.getPendientes(function(data) {
            $scope.encomiendas = data.encomiendas;
            $scope.loading = false;
        });
        
        $scope.loading_list = true;
        EncomiendasService.getSinEntregar(function(data) {
            $scope.encomiendas_list = data.encomiendas;
            $scope.loading_list = false;
        })
    }
    
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
    
    $scope.openFrmEncomiendaTipoAdd = function() {
        $("#btnAddDetalleProducto").addClass("disabled");
        $("#btnAddDetalleProducto").attr("disabled", true);
        $("#mdlEncomiendaTipoAdd").modal("toggle");
    }
    
    $scope.addTipoProducto = function() {
        $("#btnRegistrar").addClass("disabled");
        $("#btnRegistrar").attr("disabled", true);
        $scope.newTipoProducto.estado_id = 1;
        $scope.newTipoProducto.tipo_producto_id = $scope.newTipoProducto.producto.id;
        
        $scope.newEncomienda.encomiendas_tipos.push($scope.newTipoProducto);
        $scope.newTipoProducto = {};
        $("#mdlEncomiendaTipoAdd").modal("toggle");
        
        if ($scope.newEncomienda.tipodoc === 'factura') {
            $scope.newEncomienda.valor_neto = $scope.getNeto();
            $scope.newEncomienda.igv = $scope.getIgv();
        }
        $scope.newEncomienda.valor_total = $scope.getTotal();
        $scope.newTipoProducto.cantidad = 1;
        $("#btnRegistrar").removeClass("disabled");
        $("#btnRegistrar").attr("disabled", false);
    }
    
    $scope.getTotal = function() {
        if ($scope.newEncomienda.tipodoc === 'boleta') {
            return $scope.getNeto();
        } else {
            return parseFloat($scope.newEncomienda.valor_neto) + parseFloat($scope.newEncomienda.igv);
        }
    };
    
    $scope.getNeto = function() {
        var neto = 0;
        angular.forEach($scope.newEncomienda.encomiendas_tipos, function(v_encomienda_tipo, k_encomienda_tipo) {
            var subneto = v_encomienda_tipo.cantidad * v_encomienda_tipo.valor;
            neto += subneto;
        })
        return neto;
    };
    
    $scope.getIgv = function() {
        return 18 * $scope.newEncomienda.valor_neto /100;
    }
    
    $scope.getSubTotal = function() {
        if ($scope.newTipoProducto.hasOwnProperty("producto") && $scope.newTipoProducto.cantidad != undefined){
            if ($scope.newTipoProducto.valor === undefined) {
                $scope.newTipoProducto.valor = $scope.newTipoProducto.producto.valor;
            }
            return $scope.newTipoProducto.cantidad * $scope.newTipoProducto.valor;
        } else {
            return 0;
        }
    }
    
    $scope.saveEncomienda = function() {
        // Validacion
        if ($scope.origen_selected === $scope.destino_selected) {
            alert('El origen y el destino no pueden ser los mismos');
            return;
        }
        
        if ($scope.remitente.id === $scope.destinatario.id) {
            alert('El remitente y el destinatario no pueden ser los mismos');
            return;
        }
        
        if($scope.newEncomienda.encomiendas_tipos.length === 0) {
            alert('Ingreso al menos un producto');
            return;
        }
      
        $("#btnRegistrarEncomienda").addClass("disabled");
        $("#btnRegistrarEncomienda").attr("disabled", true);
        $scope.newEncomienda.remitente = $scope.remitente.id;
        $scope.newEncomienda.destinatario = $scope.destinatario.id;
        $scope.newEncomienda.estado_id = 1;
        $scope.newEncomienda.fechahora = $filter("date")($scope.newEncomienda.preFechahora, "yyyy-MM-dd HH:mm:ss");
        if ($scope.newEncomienda.tipodoc === 'boleta') {
            if ($scope.newEncomienda.valor_total == null) {
                $scope.newEncomienda.valor_total = $scope.getTotal();
            }
        }
        DesplazamientosService.getByOrigenAndDestino({
            origen: $scope.origen_selected,
            destino: $scope.destino_selected
        }, function(data) {
            $scope.newEncomienda.desplazamiento_id = data.desplazamiento.id;
            if ($scope.newEncomienda.tipodoc === 'factura') {
                $scope.newEncomienda.cliente_id = $scope.newEncomienda.cliente.id;
            }
            EncomiendasService.save($scope.newEncomienda, function(data) {
                $scope.message = data.message;
                if ($scope.message.type = 'success') {                    
                    $('#ulTabs li:eq(1) a').tab('show');
                    $scope.construct();
                    $scope.listEncomiendas();
                    $window.open('encomiendas/' + data.message.id, '_blank');
                }
                $("#btnRegistrarEncomienda").removeClass("disabled");
                $("#btnRegistrarEncomienda").attr("disabled", false);
            });
        });
    };
    
    $scope.asignar = function() {
        $("#btnAsignar").addClass("disabled");
        $("#btnAsignar").attr("disabled", true);
        
        if ($scope.encomiendas_selected.length != 0) {
            $("#mdlAsignarEncomiendas").modal("toggle");
            $scope.loading_programaciones = true;
            ProgramacionesService.get(function(data) {
                $scope.programaciones_filtradas = data.programaciones;
                $scope.loading_programaciones = false;
            });
        } else {
            alert("Seleccione una o más encomiendas");
            
            $("#btnAsignar").removeClass("disabled");
            $("#btnAsignar").attr("disabled", false);
        }
    }
    
    $scope.registrarAsignacion = function(programacion_id) {
        EncomiendasService.asignar({
            encomiendas: $scope.encomiendas_selected,
            programacion_id: programacion_id
        }, function(data) {
            $scope.message = data.message;
            $("#mdlAsignarEncomiendas").modal("toggle");
            $scope.listEncomiendas();
            
            $("#btnAsignar").removeClass("disabled");
            $("#btnAsignar").attr("disabled", false);
        });
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
        $window.open('encomiendas/' + id, '_blank');
    };
    
    $scope.cancelarAsignacion = function(id) {
        if (confirm('¿Està seguro de cancelar la asignaciòn?')) {
            EncomiendasService.cancelarAsignacion({id: id}, function(data) {
                $scope.message = data.message;
                $scope.listEncomiendas();
            });
        }
    };
    
    $scope.registrarEntrega = function(id) {
        if (confirm('¿Està seguro de registrar la entrega de esta encomienda?'))
        EncomiendasService.registrarEntrega({id: id}, function(data) {
            $scope.message = data.message;
            $scope.listEncomiendas();
        });
    };
    
    $scope.cancelarPrdoucto = function(index) {
        $scope.newEncomienda.encomiendas_tipos.splice(index, 1);
        if ($scope.newEncomienda.tipodoc === 'factura') {
            $scope.newEncomienda.valor_neto = $scope.getNeto();
            $scope.newEncomienda.igv = $scope.getIgv();
        }
        $scope.newEncomienda.valor_total = $scope.getTotal();
    }
    
    $scope.calcularTotal = function() {
        $scope.newEncomienda.igv = $scope.getIgv();
        $scope.newEncomienda.valor_total = $scope.getTotal();
    }
    
    $scope.searchCliente = function() {
        ClientesService.findByRuc({ruc: $scope.newEncomienda.ruc}, function(data) {
            $scope.newEncomienda.cliente = data.cliente;
        });
    }
    
    $scope.addCliente = function() {
        $("#btnAddCliente").addClass("disabled");
        $scope.modalUrl = VentaPasajesApp.path_location + "clientes/add";
    };
    
    $scope.listEncomiendas();
    
    $scope.$watch('newEncomienda.tipodoc', function() {
        var tipodoc = $scope.newEncomienda.tipodoc;
        
        // Get Next Nro Doc
        EncomiendasService.getNextNroDoc({tipodoc: tipodoc}, function(data) {
            $scope.newEncomienda.nro_doc = data.nro_doc;
        });
        
        // Eliminar cliente si es boleta;
        if (tipodoc == 'boleta') {
            $scope.newEncomienda.ruc = '';
            $scope.newEncomienda.cliente = [];
        }
        
        // Volver a calcular subtotal, igv, total
        if (tipodoc == 'factura') {
            $scope.newEncomienda.valor_neto = $scope.newEncomienda.valor_total;
            $scope.calcularTotal();
        } else {
            $scope.newEncomienda.valor_total = $scope.newEncomienda.valor_neto;
            $scope.newEncomienda.igv = 0;
            $scope.newEncomienda.valor_neto = 0;
        }
    });
    
    $scope.filter_encomiendas = function (item) { 
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
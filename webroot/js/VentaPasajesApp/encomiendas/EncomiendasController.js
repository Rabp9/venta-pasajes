var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EncomiendasController", function($scope, AgenciasService, $filter, 
    EncomiendasService, TipoProductosService, PersonasService, DesplazamientosService, ProgramacionesService,
    $window
) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    var date = new Date();
    $scope.newEncomienda = {};
    $scope.newTipoProducto = {};
    $scope.newEncomienda.preFechahora = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
    $scope.newEncomienda.encomiendas_tipos = [];
    $scope.encomiendas_selected = [];
    $scope.loading_programaciones = false;
    $scope.tipodoc = "";
    
    $scope.listEncomiendas = function() {
        EncomiendasService.getPendientes(function(data) {
            $scope.encomiendas = data.encomiendas; 
        });
        EncomiendasService.getSinEntregar(function(data) {
            $scope.encomiendas_sin_entregar = data.encomiendas;
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
        PersonasService.findByDni({dni: $scope.remitente_dni}, function(data) {
            $scope.remitente = data.persona;
        });
    }
    
    $scope.buscarDestinatario = function() {
        PersonasService.findByDni({dni: $scope.destinatario_dni}, function(data) {
            $scope.destinatario = data.persona;
        });
    }
    
    $scope.openFrmEncomiendaTipoAdd = function() {
        $("#mdlEncomiendaTipoAdd").modal("toggle");
    }
    
    $scope.addTipoProducto = function() {
        $scope.newTipoProducto.estado_id = 1;
        $scope.newTipoProducto.tipo_producto_id = $scope.newTipoProducto.producto.id;
        
        $scope.newEncomienda.encomiendas_tipos.push($scope.newTipoProducto);
        $scope.newTipoProducto = {};
        $("#mdlEncomiendaTipoAdd").modal("toggle");
        
        if ($scope.newEncomienda.tipodoc === 'factura') {
            $scope.newEncomienda.valor_neto = $scope.getNeto();
            $scope.newEncomienda.igv = $scope.getIgv();
        }
        alert($scope.newEncomienda.valor_total);
        alert($scope.getTotal());
        $scope.newEncomienda.valor_total = $scope.getTotal();
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
            var subneto = v_encomienda_tipo.cantidad * v_encomienda_tipo.producto.valor;
            neto += subneto;
        })
        return neto;
    };
    
    $scope.getIgv = function() {
        return 18 * $scope.newEncomienda.valor_neto /100;
    }
    
    $scope.getSubTotal = function() {
        if ($scope.newTipoProducto.hasOwnProperty("producto") && $scope.newTipoProducto.cantidad != undefined){
            return $scope.newTipoProducto.cantidad * $scope.newTipoProducto.producto.valor;
        } else {
            return 0;
        }
    }
    
    $scope.saveEncomienda = function() {
        $("#btnRegistrarEncomienda").addClass("disabled");
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
            EncomiendasService.save($scope.newEncomienda, function(data) {
                $scope.message = data.message;
                $('#ulTabs li:eq(0) a').tab('show');
                $window.open('encomiendas/' + data.message.id, '_blank');
                $scope.listEncomiendas();
            });
        });
        $("#btnRegistrarEncomienda").removeClass("disabled");
    };
    
    $scope.asignar = function() {
        if ($scope.encomiendas_selected.length != 0) {
            $("#mdlAsignarEncomiendas").modal("toggle");
            $scope.loading_programaciones = true;
            ProgramacionesService.get(function(data) {
                $scope.programaciones_filtradas = data.programaciones;
                $scope.loading_programaciones = false;
            });
        } else {
            alert("Seleccione una o más encomiendas");
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
        EncomiendasService.cancelarAsignacion({id: id}, function(data) {
            $scope.message = data.message;
            $scope.listEncomiendas();
        });
    };
    
    $scope.registrarEntrega = function(id) {
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
    
    $scope.listEncomiendas();
});
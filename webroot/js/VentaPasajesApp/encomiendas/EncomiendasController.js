var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EncomiendasController", function($scope, AgenciasService, $filter, 
    EncomiendasService, TipoProductosService, PersonasService, DesplazamientosService, ProgramacionesService
) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    var date = new Date();
    $scope.newEncomienda = {};
    $scope.newTipoProducto = {};
    $scope.newEncomienda.preFechahora = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
    $scope.encomiendas_tipos = [];
    $scope.encomiendas_selected = [];
    $scope.loading_programaciones = false;
    
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
        $scope.encomiendas_tipos.push($scope.newTipoProducto);
        $scope.newTipoProducto = {};
        $("#mdlEncomiendaTipoAdd").modal("toggle");
    }
    
    $scope.getTotal = function() {
        var total = 0;
        angular.forEach($scope.encomiendas_tipos, function(v_encomienda_tipo, k_encomienda_tipo) {
            var subtotal = v_encomienda_tipo.cantidad * v_encomienda_tipo.producto.valor;
            total += subtotal;
        })
        return total;
    };
    
    $scope.getSubTotal = function() {
        if ($scope.newTipoProducto.hasOwnProperty("producto") && $scope.newTipoProducto.cantidad != undefined){
            return $scope.newTipoProducto.cantidad * $scope.newTipoProducto.producto.valor;
        } else {
            return 0;
        }
    }
    
    $scope.saveEncomienda = function() {
        $scope.newEncomienda.remitente = $scope.remitente.id;
        $scope.newEncomienda.destinatario = $scope.destinatario.id;
        $scope.newEncomienda.estado_id = 1;
        $scope.newEncomienda.fechahora = $filter("date")($scope.newEncomienda.preFechahora, "yyyy-MM-dd HH:mm:ss");
        if ($scope.newEncomienda.valor == null) {
            $scope.newEncomienda.valor = $scope.getTotal();
        }
        DesplazamientosService.getByOrigenAndDestino({
            origen: $scope.origen_selected,
            destino: $scope.destino_selected
        }, function(data) {
            $scope.newEncomienda.desplazamiento_id = data.desplazamiento.id;
            EncomiendasService.save($scope.newEncomienda, function(data) {
                console.log(data);
                $scope.listEncomiendas();
            });
        });
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
            console.log(data);
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
    }
    
    $scope.listEncomiendas();
});
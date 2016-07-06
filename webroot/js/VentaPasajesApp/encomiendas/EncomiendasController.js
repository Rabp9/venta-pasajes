var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EncomiendasController", function($scope, AgenciasService, $filter, 
    ProgramacionesService, DesplazamientosService, EncomiendasService, 
    TipoProductosService, PersonasService,
    DetalleDesplazamientosService
) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    var date = new Date();
    $scope.fecha = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
    $scope.encomiendas_tipos = [];
    
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
        console.log(data);
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
            });
        });
    }
    
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
        $("#mdlEncomiendaTipoAdd").modal("toggle");
    }
    
    $scope.getTotal = function() {
        var total = 0;
        angular.forEach($scope.encomiendas_tipos, function(v_encomienda_tipo, k_encomienda_tipo) {
            var subtotal = v_encomienda_tipo.cantidad * v_encomienda_tipo.producto.valor;
            total = subtotal;
        })
        return total;
    }
    
});
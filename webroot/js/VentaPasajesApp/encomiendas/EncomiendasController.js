var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EncomiendasController", function($scope, AgenciasService, $filter, 
    EncomiendasService, TipoProductosService, PersonasService, DesplazamientosService
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
    
    EncomiendasService.get(function(data) {
       $scope.encomiendas = data.encomiendas; 
    });
    
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
            console.log($scope.newEncomienda);
            EncomiendasService.save($scope.newEncomienda, function(data) {
                console.log(data);
            });
        });
    };
});
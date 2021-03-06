var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListTarifasController", function($filter, $scope, TarifasService, AgenciasService, ServiciosService, DesplazamientosService) {
    $scope.predicate = "id";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.origen_selected = 0;
    $scope.destino_selected = 0;
    $scope.servicio_selected = 0;
    $scope.restringido = false;
    $scope.message = "";
    $scope.newTarifa = new TarifasService();
    
    ServiciosService.get(function(data) {
        $scope.servicios = data.servicios;
    });
    
    $scope.agencias = AgenciasService.get(function() {
        $scope.agencias = $scope.agencias.agencias;
    });
    
    $scope.list = function() {
        TarifasService.findByOrigenDestino({
            servicio: $scope.servicio_selected, 
            origen: $scope.origen_selected, 
            destino: $scope.destino_selected
        }, function(data) {
            $scope.tarifas = data.tarifas;
            $scope.loading = false;
            if($scope.origen_selected == $scope.destino_selected && 
                $scope.origen_selected != 0 && $scope.destino_selected != 0) {
                $scope.warning = "El origen y el destino no pueden ser los mismos";
                $scope.restringido = true;
            }
            if($scope.servicio_selected == 0 && $scope.tarifas.length == 0) {
                $scope.warning = "Seleccione un servicio";
                $scope.restringido = true;                
            }
        });
    }
    
    $scope.onSelected = function() {
        $scope.loading = true;
        $scope.restringido = false;
        if($scope.origen_selected == null) {
            $scope.origen_selected = 0;
        }
        if($scope.destino_selected == null) {
            $scope.destino_selected = 0;
        }
        if($scope.servicio_selected == null) {
            $scope.servicio_selected = 0;
        }
        $scope.list();
    }
    
    $scope.registerTarifa = function() {
        $('#btnRegistrarTarifa').addClass('disabled');
        $('#btnRegistrarTarifa').prop('disabled', true);
        
        $scope.modalUrl = VentaPasajesApp.path_location + "tarifas/add";
        $scope.AgenciaOrigen = $filter('filter')($scope.agencias, function (a) {
            return a.id === $scope.origen_selected;
        })[0];
        $scope.AgenciaDestino = $filter('filter')($scope.agencias, function (a) {
            return a.id === $scope.destino_selected;
        })[0];
        $scope.Servicio = $filter('filter')($scope.servicios, function (a) {
            return a.id === $scope.servicio_selected;
        })[0];
    };
    
    $scope.addTarifa = function() {
        if ($scope.newTarifa.precio_max < $scope.newTarifa.precio_min) {
            alert('El precio máximo tiene que ser mayor al precio mínimo');
            return;
        }
        $('#btnAddRegistrarTarifa').addClass('disabled');
        $('#btnAddRegistrarTarifa').prop('disabled', true);
        $scope.newTarifa.servicio_id = $scope.servicio_selected;
        
        TarifasService.save({tarifa: $scope.newTarifa, origen: $scope.origen_selected, destino: $scope.destino_selected}, function(data) {
            $("#mdlTarifas").modal('toggle');
            $scope.newTarifa = new TarifasService();
            $scope.actualizarMessage(data.message);
            $scope.list();
            $('#btnAddRegistrarTarifa').removeClass('disabled');
            $('#btnAddRegistrarTarifa').prop('disabled', false);
        });
    }
    
    $scope.updateTarifa = function(id) {
        $scope.modalUrl = VentaPasajesApp.path_location + "tarifas/edit/" + id;
        
        $scope.editTarifa = TarifasService.get({ id: id }, function() {
            $scope.editTarifa = $scope.editTarifa.tarifa;
            delete $scope.editTarifa.estado;
        });
    }
    
    $scope.updatePostTarifa = function() {
        if ($scope.editTarifa.precio_max < $scope.editTarifa.precio_min) {
            alert('El precio máximo tiene que ser mayor al precio mínimo');
            return;
        }
        $('#btnEditRegistrarTarifa').addClass('disabled');
        $('#btnEditRegistrarTarifa').prop('disabled', true);
        var tarifa = TarifasService.get({id: $scope.editTarifa.id}, function() {
            tarifa = angular.extend(tarifa, $scope.editTarifa);
            delete tarifa.servicio;
            delete tarifa.desplazamiento;
            tarifa.$update({id: $scope.editTarifa.id}, function(data) {
                $("#mdlTarifas").modal('toggle');
                $scope.actualizarMessage(data.message);
                $scope.list();
                $('#btnEditRegistrarTarifa').removeClass('disabled');
                $('#btnEditRegistrarTarifa').prop('disabled', false);
            });
        });
    }
    
    $("#mdlTarifas").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $scope.modalUrl = ""; 
            $('#btnRegistrarTarifa').removeClass('disabled');
            $('#btnRegistrarTarifa').prop('disabled', false);
        });
    });
    
    $scope.openModal = function() {
        $("#mdlTarifas").modal("toggle");
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    } 
    
    $scope.list();
});
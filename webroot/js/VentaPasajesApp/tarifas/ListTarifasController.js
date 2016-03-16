var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListTarifasController", function($filter, $rootScope, $scope, TarifasService, AgenciasService) {
    $scope.predicate = "id";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.origen_selected = 0;
    $scope.destino_selected = 0;
    $scope.restringido = false;
    $scope.newTarifa = new TarifasService();
    
    $scope.agencias = AgenciasService.get(function() {
        $scope.agencias = $scope.agencias.agencias;
    });
    
    $scope.list = function() {
        TarifasService.findByOrigenDestino({
            origen: $scope.origen_selected, 
            destino: $scope.destino_selected
        }, function(data) {
            $scope.tarifas = data.tarifas;
            $scope.loading = false;
            if($scope.origen_selected == $scope.destino_selected && $scope.origen_selected != 0 && $scope.destino_selected != 0) {
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
        $scope.list();
    }
    
    $scope.registerTarifa = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "tarifas/add";
        $scope.AgenciaOrigen = $filter('filter')($scope.agencias, function (a) {
            return a.id === $scope.origen_selected;
        })[0];
        $scope.AgenciaDestino = $filter('filter')($scope.agencias, function (a) {
            return a.id === $scope.destino_selected;
        })[0];
    };
    
    $scope.addTarifa = function() {
        $scope.newTarifa.origen = $scope.origen_selected;
        $scope.newTarifa.destino = $scope.destino_selected;
        TarifasService.save($scope.newTarifa, function() {
            
            var temp = $scope.newTarifa.origen;
            $scope.newTarifa.origen = $scope.newTarifa.destino;
            $scope.newTarifa.destino = temp;
            TarifasService.save($scope.newTarifa, function() {
                $scope.newTarifa = new TarifasService();
                $("#mdlTarifas").modal('toggle');
                $scope.newTarifa = new TarifasService();
                $scope.list();
            });
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
        var tarifa = TarifasService.get({id: $scope.editTarifa.id}, function() {
            tarifa = angular.extend(tarifa, $scope.editTarifa);
            delete tarifa.AgenciaOrigen; 
            delete tarifa.AgenciaDestino;
            tarifa.$update({id: $scope.editTarifa.id}, function() {
                $("#mdlTarifas").modal('toggle');
                $scope.list();
            });
        });
    }
    
    $("#mdlTarifas").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $scope.modalUrl = ""; 
        });
    });
    
    $scope.openModal = function() {
        $("#mdlTarifas").modal("toggle");
    };
    
    $scope.list();
});
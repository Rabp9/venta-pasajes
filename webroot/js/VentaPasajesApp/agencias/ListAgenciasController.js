var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListAgenciasController", function($scope, AgenciasService) {
    $scope.agencias = [];
    $scope.id = "";
    $scope.loading = true;
    
    $scope.list = function() {
        alert("aaaaa");
        $scope.loading = true;
        $scope.agencias = AgenciasService.get(function() {
            $scope.agencias = $scope.agencias.agencias;
            $scope.loading = false;
        });
    };
    
    $scope.addAgencia = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "agencias/add";
    };
    
    $scope.editAgencia = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "agencias/edit/" + id;
    };
    
    $scope.viewAgencia = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "agencias/view/" + id;
    };
    
    $scope.removeAgencia = function(id) {
        if(confirm("¿Está seguro de desactivar este bus?")) {
            var bus = AgenciasService.get({id: id}, function() {
                bus.estado_id = 2;
                delete agencia.estado; 
                agencia.$update({id: id}, function() {
                    $scope.list();
                });
            });
        }
    }
    
    $scope.list();
});
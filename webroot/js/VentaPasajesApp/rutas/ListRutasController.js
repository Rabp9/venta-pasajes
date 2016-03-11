var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListRutasController", function($scope, RutasService, AgenciasService) {
    $scope.rutas = {};  
    $scope.agencias = {};
    $scope.ruta_selected = [];
    $scope.detalle_desplazamiento = [];
    $scope.next_origen = [];
    
    $scope.list = function() {
        $scope.rutas = RutasService.get(function() {
            $scope.rutas = $scope.rutas.rutas;
        });
        $scope.agencias = AgenciasService.get(function() {
            $scope.agencias = $scope.agencias.agencias;
        });
    };
    
    $scope.loadDesplazamientos = function(id) {
        $scope.ruta_selected = RutasService.get({id: id}, function() {
           $scope.ruta_selected = $scope.ruta_selected.ruta;
           console.log($scope.ruta_selected);
           $scope.next_origen = $scope.ruta_selected.detalle_desplazamientos[$scope.ruta_selected.detalle_desplazamientos.length - 1];
        });
    };
    
    $scope.openNuevoDesplazamiento = function() {
        $("#mdlDesplazamientos").modal("toggle");
    }
    
    $scope.list();
});
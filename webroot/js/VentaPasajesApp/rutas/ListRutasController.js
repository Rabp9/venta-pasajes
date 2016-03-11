var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListRutasController", function($scope, RutasService) {
    $scope.rutas = [];
    $scope.ruta_selected = [];
    
    $scope.list = function() {
        $scope.rutas = RutasService.get(function() {
            $scope.rutas = $scope.rutas.rutas;
        });
    };
    
    $scope.loadDesplazamientos = function(id) {
        $scope.ruta_selected = RutasService.get({id: id}, function() {
           $scope.ruta_selected = $scope.ruta_selected.ruta;
        });
    };
    
    $scope.list();
});
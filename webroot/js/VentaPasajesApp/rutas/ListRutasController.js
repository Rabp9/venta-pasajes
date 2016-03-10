var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListRutasController", function($scope, RutasService) {
    $scope.rutas = "";
    
    $scope.list = function() {
        $scope.rutas = RutasService.get(function() {
            $scope.rutas = $scope.rutas.rutas;
        });
    };
    
    $scope.list();
});
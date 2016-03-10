var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListRutasController", function($scope, $http, RutasService) {
    $scope.rutas = [];
    $scope.ruta_selected = new RutasService();
    
    $scope.list = function() {
        $scope.rutas = RutasService.get(function() {
            $scope.rutas = $scope.rutas.rutas;
        });
    };
    
    $scope.loadDesplazamientos = function(id) {
        $scope.ruta_selected = $http.get("http://localhost:8000/venta-pasajes/rutas/" + id + ".json", function() {
            console.log($scope.ruta_selected);
        });
    };
    
    $scope.list();
});
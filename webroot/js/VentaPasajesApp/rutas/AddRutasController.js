var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddRutasController", function($scope, RutasService) {
    $scope.newRuta = new RutasService();
    
    $scope.addRuta = function() {
        console.log($scope.newRuta);
        var ruta = RutasService.save($scope.newRuta, function() {
            $("#mdlRutas").modal('toggle');
            $scope.newRuta = new RutasService();
            $scope.$parent.list();
        });
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.controller("AddAgenciasController", function($scope, AgenciasService) {
    $scope.newAgencia = new AgenciasService();
    
    $scope.addAgencia = function() {
        var agencia = AgenciasService.save($scope.newAgencia, function() {
            $("#mdlAgencias").modal('toggle');
            $scope.newAgencia = new AgenciasService();
            $scope.$parent.list();
        });
    }
});
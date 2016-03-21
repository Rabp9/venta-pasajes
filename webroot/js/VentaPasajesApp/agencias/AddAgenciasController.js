var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddAgenciasController", function($scope, AgenciasService, UbigeosService) {
    $scope.newAgencia = new AgenciasService();
    
    $scope.ubigeos = UbigeosService.get(function() {
        $scope.ubigeos = $scope.ubigeos.ubigeos;
        $scope.ubigeos = Object.keys($scope.ubigeos).map(function(value, index) {
            var obj = {
                id: parseInt(value),
                descripcion: $scope.ubigeos[value]
            };
            return obj;
        });
    });
    
    $scope.addAgencia = function() {
        AgenciasService.save($scope.newAgencia, function() {
            $("#mdlAgencias").modal('toggle');
            $scope.newAgencia = new AgenciasService();
            var message = {
                type: "success",
                text: "Agencia registrada correctamente"
            };
            $scope.$parent.actualizarMessage(message);
            $scope.$parent.list();
        });
    }
});

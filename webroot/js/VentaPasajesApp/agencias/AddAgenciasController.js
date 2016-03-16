var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.controller("AddAgenciasController", function($scope, AgenciasService) {
    $scope.newAgencia = new AgenciasService();
    
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

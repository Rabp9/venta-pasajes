var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddClientesController", function($scope, ClientesService) {
    $scope.newCliente = new ClientesService();
        
    $scope.addCliente = function() {
        $("#btnRegistrar").addClass("disabled");
        ClientesService.save($scope.newCliente, function(data) {
            $("#mdlClientes").modal('toggle');
            $scope.newCliente = new ClientesService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });
    };
});

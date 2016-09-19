var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddClientesController", function($scope, ClientesService) {
    $scope.newCliente = new ClientesService();
    $scope.newCliente.estado_id = 1;
        
    $scope.addCliente = function() {
        $("#btnRegistrarCliente").addClass("disabled");
        $("#btnRegistrarCliente").attr("disabled", true);
        ClientesService.save($scope.newCliente, function(data) {
            $("#mdlClientes").modal('toggle');
            $scope.newCliente = new ClientesService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
            $("#btnRegistrarCliente").removeClass("disabled");
            $("#btnRegistrarCliente").attr("disabled", false);
        });
    };
});

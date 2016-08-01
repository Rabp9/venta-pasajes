var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditClientesController", function($scope, ClientesService, EstadosService) {
    $scope.estados = new EstadosService();
    
    ClientesService.get({ id: $scope.$parent.id }, function(data) {
        $scope.editCliente = data.cliente;
    });
    
    $scope.estados = EstadosService.get(function() {
        $scope.estados = $scope.estados.estados;
    });
    
    $scope.updateCliente = function() {
        $("#btnRegistrar").addClass("disabled");
        var cliente = ClientesService.get({id: $scope.$parent.id}, function() {
            cliente = angular.extend(cliente, $scope.editCliente);
            delete cliente.estado;
            cliente.$update({id: $scope.$parent.id}, function(data) {
                $("#mdlClientes").modal('toggle');
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
            });
        });
    }
});
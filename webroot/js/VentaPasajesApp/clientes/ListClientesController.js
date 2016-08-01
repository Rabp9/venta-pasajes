var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListClientesController", function($rootScope, $scope, ClientesService) {
    $scope.id = "";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = "";
    
    $scope.openModal = function() {
        $("#mdlClientes").modal("toggle");
    };
      
    $("#mdlClientes").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAddCliente").removeClass("disabled");
            $scope.modalUrl = ""; 
        });
    });
    
    $scope.list = function() {
        $scope.loading = true;
        ClientesService.get(function(data) {
            $scope.clientes = data.clientes;
            $scope.loading = false;
        });
    };
    
    $scope.order = function(predicate) {
        $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
        $scope.predicate = predicate;
    };
    
    $scope.addCliente = function() {
        $("#btnAddCliente").addClass("disabled");
        $scope.modalUrl = VentaPasajesApp.path_location + "clientes/add";
    };
    
    $scope.editCliente = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "clientes/edit/" + id;
    };
    
    $scope.viewCliente = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "clientes/view/" + id;
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    };
    
    $scope.removeCliente = function(id) {
        if(confirm("¿Está seguro de desactivar esta Cliente?")) {
            var cliente = ClientesService.get({id: id}, function() {
                cliente.estado_id = 2;
                delete cliente.estado; 
                cliente.$update({id: id}, function(data) {
                    $scope.actualizarMessage(data.message);
                    $scope.list();
                });
            });
        }
    };
    
    $scope.list();
});
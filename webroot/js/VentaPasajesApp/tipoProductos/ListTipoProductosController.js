var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListTipoProductosController", function($scope, TipoProductosService) {
    $scope.id = "";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = "";
    
    $scope.openModal = function() {
        $("#mdlTipoProductos").modal("toggle");
    }
    
    $("#mdlTipoProductos").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAddTipoProducto").removeClass("disabled");
            $("#btnAddTipoProducto").prop("disabled", false);
            $scope.modalUrl = "";
        });
    });
    
    $scope.list = function() {
        $scope.loading = true;
        TipoProductosService.get(function(data) {
            $scope.tipoProductos = data.tipoProductos;
            $scope.loading = false;
        });
    };
    
    $scope.order = function(predicate) {
        $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
        $scope.predicate = predicate;
    };
    
    $scope.addTipoProducto = function() {
        $("#btnAddTipoProducto").addClass("disabled");
        $("#btnAddTipoProducto").prop("disabled", true);
        $scope.modalUrl = VentaPasajesApp.path_location + "tipoProductos/add";
    };
    
    $scope.editTipoProducto = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "tipoProductos/edit/" + id;
    };
    
    $scope.viewTipoProducto = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "tipoProductos/view/" + id;
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    } 
    
    $scope.removeTipoProducto = function(id) {
        if(confirm("¿Está seguro de desactivar este tipoProducto?")) {
            var tipoProducto = TipoProductosService.get({id: id}, function() {
                tipoProducto.estado_id = 2;
                delete tipoProducto.estado; 
                tipoProducto.$update({id: id}, function(data) {
                    $scope.actualizarMessage(data.message);
                    $scope.list();
                });
            });
        }
    }
    
    $scope.list();
});
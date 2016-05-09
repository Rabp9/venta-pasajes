var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListAgenciasController", function($rootScope, $scope, AgenciasService) {
    $scope.id = "";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = "";
    
    $scope.openModal = function() {
        $("#mdlAgencias").modal("toggle");
    };
      
    $("#mdlAgencias").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAddAgencia").removeClass("disabled");
            $scope.modalUrl = ""; 
        });
    });
    
    $scope.list = function() {
        $scope.loading = true;
        AgenciasService.get(function(data) {
            $scope.agencias = data.agencias;
            $scope.loading = false;
        });
    };
    
    $scope.order = function(predicate) {
        $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
        $scope.predicate = predicate;
    };
    
    $scope.addAgencia = function() {
        $("#btnAddAgencia").addClass("disabled");
        $scope.modalUrl = VentaPasajesApp.path_location + "agencias/add";
    };
    
    $scope.editAgencia = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "agencias/edit/" + id;
    };
    
    $scope.viewAgencia = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "agencias/view/" + id;
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    } 
    
    $scope.removeAgencia = function(id) {
        if(confirm("¿Está seguro de desactivar esta Agencia?")) {
            var agencia = AgenciasService.get({id: id}, function() {
                agencia.estado_id = 2;
                delete agencia.estado; 
                agencia.$update({id: id}, function(data) {
                    $scope.actualizarMessage(data.message);
                    $scope.list();
                });
            });
        }
    }
    
    $scope.list();
});
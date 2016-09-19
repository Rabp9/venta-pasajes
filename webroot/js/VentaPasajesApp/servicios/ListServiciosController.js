var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListServiciosController", function($scope, ServiciosService) {
    $scope.id = "";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = "";
    
    $scope.openModal = function() {
        $("#mdlServicios").modal("toggle");
    }
    
    $("#mdlServicios").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAddServicio").removeClass("disabled");
            $("#btnAddServicio").prop("disabled", false);
            $scope.modalUrl = "";
        });
    });
    
    $scope.list = function() {
        $scope.loading = true;
        ServiciosService.get(function(data) {
            $scope.servicios = data.servicios;
            $scope.loading = false;
        });
    };
    
    $scope.order = function(predicate) {
        $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
        $scope.predicate = predicate;
    };
    
    $scope.addServicio = function() {
        console.log($('#btnAddServicio').text());
        $("#btnAddServicio").addClass("disabled");
        $("#btnAddServicio").prop("disabled", true);
        $scope.modalUrl = VentaPasajesApp.path_location + "servicios/add";
    };
    
    $scope.editServicio = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "servicios/edit/" + id;
    };
    
    $scope.viewServicio = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "servicios/view/" + id;
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    } 
    
    $scope.removeServicio = function(id) {
        if(confirm("¿Está seguro de desactivar este servicio?")) {
            var servicio = ServiciosService.get({id: id}, function() {
                servicio.estado_id = 2;
                delete servicio.estado; 
                servicio.$update({id: id}, function(data) {
                    $scope.actualizarMessage(data.message);
                    $scope.list();
                });
            });
        }
    }
    
    $scope.list();
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListPersonasController", function($rootScope, $scope, PersonasService) {
    $scope.id = "";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = "";
    
    $scope.openModal = function() {
        $("#mdlPersonas").modal("toggle");
    };
    
    $("#mdlPersonas").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAddPersona").removeClass("disabled");
            $("#btnAddPersona").prop("disabled", false);
            $scope.modalUrl = ""; 
        });
    });
    
    $scope.list = function() {
        $scope.loading = true;
        PersonasService.get(function(data) {
            $scope.personas = data.personas;
            $scope.loading = false;
        });
    };
    
    $scope.order = function(predicate) {
        $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
        $scope.predicate = predicate;
    };
    
    $scope.addPersona = function() {
        $("#btnAddPersona").addClass("disabled");
        $("#btnAddPersona").prop("disabled", true);
        $scope.modalUrl = VentaPasajesApp.path_location + "personas/add";
    };
    
    $scope.editPersona = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "personas/edit/" + id;
    };
    
    $scope.viewPersona = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "personas/view/" + id;
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    } 
    
    $scope.removePersona = function(id) {
        if(confirm("¿Está seguro de desactivar este cliente?")) {
            var persona = PersonasService.get({id: id}, function() {
                persona.estado_id = 2;
                delete persona.estado; 
                persona.$update({id: id}, function() {
                    $scope.actualizarMessage(data.message);
                    $scope.list();
                });
            });
        }
    }
    
    /* 
    $scope.buscarpersona = function() {
        $scope.loading = true;
        PersonasService.findByDni({dni: $scope.dni}, function(data) {
            $scope.personas = [];
            if(data.persona !== null) {
                $scope.personas.push(data.persona);
            }
            $scope.loading = false;
        });
    }*/
    
    $scope.list();
});
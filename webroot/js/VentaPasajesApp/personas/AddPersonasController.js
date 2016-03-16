var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.controller("AddPersonasController", function($scope, PersonasService) {
    $scope.newPersona = new PersonasService();
    
    $scope.addPersona = function() {
        var persona = PersonasService.save($scope.newPersona, function() {
            $("#mdlPersonas").modal('toggle');
            $scope.newPersona = new PersonasService();
            $scope.$parent.list();
        });
    }
});
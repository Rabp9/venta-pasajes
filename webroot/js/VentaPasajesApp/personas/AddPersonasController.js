var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.controller("AddPersonasController", function($scope, PersonasService) {
    $scope.newPersona = new PersonasService();
    
    $scope.addPersona = function() {
        $("#btnRegistrar").addClass("disabled");
        PersonasService.save($scope.newPersona, function(data) {
            console.log(data);
            $("#mdlPersonas").modal('toggle');
            $scope.newPersona = new PersonasService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });
    };
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditPersonasController", function($scope, PersonasService) {
    PersonasService.get({ id: $scope.$parent.id }, function(data) {
        data.persona.fecha_nac = new Date(2014, 3, 3);
        $scope.editPersona = data.persona;
    });
    
    
    $scope.updatePersona = function() {
        var persona = PersonasService.get({id: $scope.$parent.id}, function() {
            persona = angular.extend(persona, $scope.editPersona);
           
            persona.$update({id: $scope.$parent.id}, function() {
                $("#mdlPersonas").modal('toggle');
                $scope.$parent.list();
            });
        });
    }
});
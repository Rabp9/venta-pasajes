var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditPersonasController", function($scope, PersonasService) {
    
    
    $scope.editPersona = PersonasService.get({ id: $scope.$parent.id }, function() {
        $scope.editPersona = $scope.editPersona.persona;
        
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
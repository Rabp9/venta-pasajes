var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditPersonasController", function($scope, PersonasService) {
    PersonasService.get({ id: $scope.$parent.id }, function(data) {
        $scope.editPersona = data.persona;
    });
    
    
    $scope.updatePersona = function() {
        $('#btnRegistrarPersona').addClass('disabled');
        $('#btnRegistrarPersona').prop('disabled', true);
        var persona = PersonasService.get({id: $scope.$parent.id}, function() {
            persona = angular.extend(persona, $scope.editPersona);
           
            persona.$update({id: $scope.$parent.id}, function() {
                $("#mdlPersonas").modal('toggle');
                $scope.$parent.list();
            });
        });
    }
});
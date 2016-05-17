var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ViewPersonasController", function($scope, PersonasService) {
    $scope.viewPersona = new PersonasService();
    
    $scope.viewPersona = PersonasService.get({ id: $scope.$parent.id }, function() {
        $scope.viewPersona = $scope.viewPersona.persona;
    });
});
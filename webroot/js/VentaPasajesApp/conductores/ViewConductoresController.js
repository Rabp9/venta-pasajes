var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ViewConductoresController", function($scope, ConductoresService) {
    $scope.viewConductor = new ConductoresService();
    
    $scope.viewConductor = ConductoresService.get({ id: $scope.$parent.id }, function() {
        $scope.viewConductor = $scope.viewConductor.Conductor;
    });
});
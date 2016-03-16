var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddConductoresController", function($scope, ConductoresService) {
    $scope.newConductor = new ConductoresService();
    
    $scope.addConductor = function() {
        ConductoresService.save($scope.newConductor, function(data) {
            $("#mdlConductores").modal('toggle');
            $scope.newConductor = new ConductoresService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });;
    }
});
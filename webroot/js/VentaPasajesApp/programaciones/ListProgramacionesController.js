var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListProgramacionesController", function($scope, $routeParams) {
    $scope.reverse = false;
    $scope.predicate = "id";
});
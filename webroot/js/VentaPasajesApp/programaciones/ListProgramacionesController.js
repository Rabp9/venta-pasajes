var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListProgramacionesController", function($scope, ProgramacionesService, $routeParams) {
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = {};
    
    $scope.list = function() {
        $scope.loading = true;
        ProgramacionesService.get(function(data) {
            $scope.programaciones = data.programaciones;
            $scope.loading = false;
            console.log($scope.programaciones);
        });
        
        if ($routeParams.type !== null) {
            $scope.message.type = $routeParams.type;
            $scope.message.text = $routeParams.text;
        }
    };
    
    $scope.list();
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddUsersController", function($scope, UsersService) {
    $scope.newUser = new UsersService();
    $scope.newUser.estado_id = 1;
    
    $scope.addUser = function() {
        $("#btnRegistrar").addClass("disabled");
        $("#btnRegistrar").prop("disabled", false);
        UsersService.save($scope.newUser, function(data) {
            $("#mdlUsers").modal('toggle');
            $scope.newUser = new UsersService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });;
    }
});
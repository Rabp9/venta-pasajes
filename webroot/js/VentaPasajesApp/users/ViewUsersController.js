var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ViewUsersController", function($scope, UsersService) {
    $scope.viewUser = new UsersService();
    
    UsersService.get({ id: $scope.$parent.id }, function(data) {
        $scope.viewUser = data.user;
    });
});
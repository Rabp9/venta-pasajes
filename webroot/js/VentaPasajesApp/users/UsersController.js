var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("UsersController", function($scope, UsersService) {
    $scope.login = function (user) {
        UsersService.login(user, function(data) {
            console.log(data);
        });
    };
});
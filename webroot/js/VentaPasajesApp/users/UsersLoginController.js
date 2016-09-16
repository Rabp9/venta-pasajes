var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("UsersLoginController", function($scope, UsersService, AgenciasService, localStorageService, $window) 
{
    $scope.error = false;
    
    $scope.login = function (user) {
        UsersService.login({
            username: user.username,
            password: user.password
        }, function(data) {
            if (data.user) {
                // Guardar usuario
                localStorageService.set('user-authenticated', data.user);
                // Redireccionar
                $window.open(VentaPasajesApp.path_location, '_self');
            } else {
                $scope.error = true;
            }
        });
    };
    
});
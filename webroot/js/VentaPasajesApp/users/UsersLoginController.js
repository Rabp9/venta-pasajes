var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("UsersLoginController", function($scope, UsersService, AgenciasService, localStorageService, $window) {
    $scope.error = false;
    
    $scope.login = function (user) {
        $('#btnAcceder').addClass('disabled');
        $('#btnAcceder').prop('disabled', true);
        UsersService.login({
            username: user.username,
            password: user.password
        }, function(data) {
            if (data.user) {
                // Guardar usuario
                localStorageService.set('user-authenticated', data.user);
                // Redireccionar
                $window.open(VentaPasajesApp.path_location, '_self');
                $('#btnAcceder').text('Accediendo')
            } else {
                $scope.error = true;
                $('#btnAcceder').removeClass('disabled');
                $('#btnAcceder').prop('disabled', false);
            }
        });
    };
});
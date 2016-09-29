var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("UsersManageController", function($scope, UsersService, AgenciasService, localStorageService, $window, 
    $rootScope) 
{
    $scope.user.agencia_id = 0;
    
    $scope.construct = function() {
        AgenciasService.get(function(data) {
            $scope.agencias = data.agencias;
            $scope.user = $rootScope.user;
        });
    };
    
    $scope.save = function(user) {
        $('#btnGuardar').addClass('disabled');
        $('btnGuardar').prop('disabled', true);
        if (user.newPassword == user.newRePassword) {
            user.password = user.newPassword;
            delete user.newPassword;
            delete user.newRePassword;
            delete user.agencia_id;
            UsersService.manage({user: user}, function(data) {
                $scope.message = data.message;
                localStorageService.set('user-authenticated', user);
                $rootScope.user.user_detalle = user.user_detalle;
                $scope.user = $rootScope.user;
                $('#btnGuardar').removeClass('disabled');
                $('btnGuardar').prop('disabled', false);
            });
        } else {
            alert('Los passwords no coinciden');
            $('#btnGuardar').removeClass('disabled');
            $('btnGuardar').prop('disabled', false);
        }
    };
    
    $scope.construct();
});
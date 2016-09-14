var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("UsersController", function($scope, UsersService, AgenciasService, localStorageService, $window) {
    $scope.error = false;
    
    $scope.list = function() {
        AgenciasService.get(function(data) {
            $scope.agencias = data.agencias;
            if (localStorageService.get('user-authenticated')) {
                $scope.user = localStorageService.get('user-authenticated');
            } else {
                $scope.user = [];
            }
        });
    };;
    
    $scope.login = function (user) {
        UsersService.login(user, function(data) {
            if (data.user) {
                // Guardar usuario
                localStorageService.set('user-authenticated', data.user);
                // Redireccionar
                $window.open('/venta-pasajes/#', '_self');
            } else {
                $scope.error = true;
            }
        });
    };
    
    $scope.list();
});
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
        var user_wm = AgenciasService.get({id: user.id}, function() {
            user_sm = angular.extend(user_sm, user);
            delete agencia.estado; 
            delete agencia.ubigeo; 
            agencia.$update({id: $scope.$parent.id}, function(data) {
                $("#mdlAgencias").modal('toggle');
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
            });
        });
        UsersService.save(user, function() {
            
        })
    };
    
    $scope.construct();
});
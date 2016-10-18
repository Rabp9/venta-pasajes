var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditUsersController", function($scope, UsersService, GroupsService, AgenciasService) {
    $scope.changePass = false;
    
    UsersService.get({ id: $scope.$parent.id }, function(data) {
        $scope.editUser = data.user;
    });
    
    GroupsService.get(function(data) {
        $scope.groups = data.groups;
    });
    
    AgenciasService.get(function(data) {
        $scope.agencias = data.agencias;
    });
    
    $scope.updateUser = function() {
        $("#btnRegistrar").addClass("disabled");
        $("#btnRegistrar").prop("disabled", true);
        var user = UsersService.get({id: $scope.$parent.id}, function() {
            user = angular.extend(user, $scope.editUser);
            delete user.estado;
            delete user.user_detalle.group;
            delete user.user_detalle.agencia;
            if (!$scope.changePass) {
                delete user.password;
            } else {
                if ($scope.editUser.password != $scope.editUser.repassword) {
                    alert('Las contraseñas deben coincidir');
                    $("#btnRegistrar").removeClass("disabled");
                    $("#btnRegistrar").prop("disabled", true);
                    return;
                }
            }
            if (user.user_detalle.group_id == 1) {
                user.user_detalle.agencia_id = null;
            }
            user.$update({id: $scope.$parent.id}, function(data) {
                $("#mdlUsers").modal('toggle');
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
            });
        });
    }
});
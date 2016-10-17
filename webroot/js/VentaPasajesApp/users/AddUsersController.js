var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddUsersController", function($scope, UsersService, GroupsService, AgenciasService) {
    $scope.newUser = new UsersService();
    $scope.newUser.estado_id = 1;
    
    GroupsService.get(function(data) {
        $scope.groups = data.groups;
    });
    
    AgenciasService.get(function(data) {
        $scope.agencias = data.agencias;
    });
    
    $scope.addUser = function() {
        $("#btnRegistrar").addClass("disabled");
        $("#btnRegistrar").prop("disabled", false);
        if ($scope.newUser.password == $scope.newUser.repassword) {
            $scope.newUser.user_detalle.estado_id = 1;
            UsersService.save($scope.newUser, function(data) {
                $("#mdlUsers").modal('toggle');
                $scope.newUser = new UsersService();
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
            });
        } else {
            alert('Las contraseñas deben coincidir');
            $("#btnRegistrar").removeClass("disabled");
            $("#btnRegistrar").prop("disabled", true);
        }
    }
});
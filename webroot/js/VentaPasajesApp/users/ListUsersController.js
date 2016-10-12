var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListUsersController", function($scope, UsersService) {
    $scope.id = "";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = "";
    
    $scope.openModalUsers = function() {
        $("#mdlUsers").modal("toggle");
    };
    
    $("#mdlUsers").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $("#btnAddUser").removeClass("disabled");
            $("#btnAddUser").prop("disabled", false);
            $scope.modalUrlUser = "";
        });
    });
    
    $scope.list = function() {
        $scope.loading = true;
        UsersService.get(function(data) {
            $scope.users = data.users;
            $scope.loading = false;
        });
    };
    
    $scope.order = function(predicate) {
        $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
        $scope.predicate = predicate;
    };
    
    $scope.addUser = function() {
        $("#btnAddUser").addClass("disabled");
        $("#btnAddUser").prop("disabled", true);
        $scope.modalUrlUser = VentaPasajesApp.path_location + "users/add";
    };
    
    $scope.editUser = function(id) {
        $scope.id = id;
        $scope.modalUrlUser = VentaPasajesApp.path_location + "users/edit/" + id;
    };
    
    $scope.viewUser = function(id) {
        $scope.id = id;
        $scope.modalUrlUser = VentaPasajesApp.path_location + "users/view/" + id;
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    };
    
    $scope.removeUser = function(id) {
        if(confirm("¿Está seguro de desactivar este usuario?")) {
            var user = UsersService.get({id: id}, function() {
                user.estado_id = 2;
                delete user.estado; 
                user.$update({id: id}, function(data) {
                    $scope.actualizarMessage(data.message);
                    $scope.list();
                });
            });
        }
    };
    
    $scope.list();
});
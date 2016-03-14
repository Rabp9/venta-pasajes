var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListBusesController", function($rootScope, $scope, BusesService) {
    $scope.id = "";
    $scope.loading = true;
    $scope.reverse = false;
    $scope.predicate = "id";
    
    $rootScope.$on('$includeContentLoaded', function(event, url) {
        $("#mdlBuses").modal("toggle");
    });
    
    $("#mdlBuses").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $scope.modalUrl = ""; 
        });
    });
    
    $scope.list = function() {
        $scope.loading = true;
        BusesService.get(function(data) {
            $scope.buses = data.buses;
            $scope.loading = false;
        });
    };
    
    $scope.order = function(predicate) {
        $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
        $scope.predicate = predicate;
    };
    
    $scope.addBus = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "buses/add";
    };
    
    $scope.editBus = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "buses/edit/" + id;
    };
    
    $scope.viewBus = function(id) {
        $scope.id = id;
        $scope.modalUrl = VentaPasajesApp.path_location + "buses/view/" + id;
    };
    
    $scope.removeBus = function(id) {
        if(confirm("¿Está seguro de desactivar este bus?")) {
            var bus = BusesService.get({id: id}, function() {
                bus.estado_id = 2;
                delete bus.estado; 
                bus.$update({id: id}, function() {
                    $scope.list();
                });
            });
        }
    }
    
    $scope.list();
});
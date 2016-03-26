var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AdministrarBusesController", function($scope, BusesService, $routeParams, Upload) {
    $scope.imagen = [];
    $scope.imgUrl = [];
    
    BusesService.get({id: $routeParams.id}, function(data) {
        $scope.bus = data.bus;
    });
   
    $scope.uploadFile = function(index){
        var file = $scope.imagen[index];
        var fd = new FormData();
        fd.append('file', file);
        
        BusesService.subir(fd, function(data) {
            $scope.imgUrl[index] = data.message.fileUrl;
        });
    };
});
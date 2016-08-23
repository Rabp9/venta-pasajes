var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ImportarController", function($scope, ImportarService) {
    
    $scope.uploadFile = function() {
        var file = $scope.backup;
         
        var fd = new FormData();
        fd.append('file', file);
        
        ImportarService.preLoad(fd, function(data) {
            $scope.nro_clientes = data.message.clientes.length;
            $scope.nro_pasajes = data.message.pasajes.length;
            $scope.nro_giros = data.message.giros.length;
            $scope.nro_encomiendas = data.message.encomiendas.length;
        });
    };
    
    $scope.import = function() {
        var file = $scope.backup;
         
        var fd = new FormData();
        fd.append('file', file);
        
        ImportarService.import(fd, function(data) {
            console.log(data);
        });
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ImportarController", function($scope, ImportarService, $window) {
    
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
    
    ImportarService.getExportCountClientes(function(data) {
        $scope.nro_clientes = data.nro_clientes;
    });
    
    ImportarService.getExportCountPasajes(function(data) {
        $scope.nro_pasajes = data.nro_pasajes;
    });
    
    ImportarService.getExportCountGiros(function(data) {
        $scope.nro_giros = data.nro_giros;
    });
    
    ImportarService.getExportCountEncomiendas(function(data) {
        $scope.nro_encomiendas = data.nro_encomiendas;
    });
    
    $scope.export = function() {
        console.log($scope.chk_clientes);
        console.log($scope.chk_pasajes);
        console.log($scope.chk_giros);
        console.log($scope.chk_encomiendas);
        ImportarService.export({
            clientes: $scope.chk_clientes,
            pasajes: $scope.chk_pasajes,
            giros: $scope.chk_giros,
            encomiendas: $scope.chk_encomiendas
        }, function(data) {
            data = JSON.stringify(data, undefined, 2);
            var blob = new Blob([data], {type: "application/json"});
            var objectUrl = $window.URL.createObjectURL(blob);
            $window.open(objectUrl);
        })
    }
});
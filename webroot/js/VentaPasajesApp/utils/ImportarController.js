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
    
    $scope.constructor = function() {
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
    }
    
    $scope.constructor();
    
    $scope.export = function() {
        $('#aExport').addClass('disabled');
        $('#aExport').attr('disabled', true);
        ImportarService.export({
            clientes: $scope.chk_clientes,
            pasajes: $scope.chk_pasajes,
            giros: $scope.chk_giros,
            encomiendas: $scope.chk_encomiendas
        }, function(data) {
            data = JSON.stringify(data, undefined, 2);
            var blob = new Blob([data], {type: "application/json"});
            
            var downloadLink = angular.element('<a></a>');
            downloadLink.attr('href',window.URL.createObjectURL(blob));
            downloadLink.attr('download', 'backup.json');
            downloadLink[0].click();
            
            $scope.constructor();
            
            $('#aExport').removeClass('disabled');
            $('#aExport').attr('disabled', false);
        })
    }
});
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
    
    allowDrop = function(ev) {
        ev.preventDefault();
    }
    
    drag = function(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }
    
    drop = function(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var img_bus_id = "#" + ev.target.id;
        var div_asiento_id = "#" + data;
        console.log("x: " + ev.clientX);
        console.log("y: " + ev.clientY);
        $(div_asiento_id).css("left", ev.clientX);
        $(div_asiento_id).css("top", ev.clientY);
        $(div_asiento_id).css("position", "absolute");
        $(img_bus_id).parent().append($(div_asiento_id));
    }
});
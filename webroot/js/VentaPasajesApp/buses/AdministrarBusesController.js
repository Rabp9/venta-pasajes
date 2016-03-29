var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AdministrarBusesController", function($scope, BusesService, $routeParams, BusPisosService) {
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
        ev.dataTransfer.setData("offset_x", ev.offsetX);
        ev.dataTransfer.setData("offset_y", ev.offsetY);
    }
    
    drop = function(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var offset_x = ev.dataTransfer.getData("offset_x");
        var offset_y = ev.dataTransfer.getData("offset_y");
        var img_bus_id = "#" + ev.target.id;
        var div_asiento_id = "#" + data;
        $(div_asiento_id).css("left", ev.offsetX - offset_x - 5);
        $(div_asiento_id).css("top", ev.offsetY - offset_y - 5);
        $(div_asiento_id).css("position", "absolute");
        $(img_bus_id).parent().append($(div_asiento_id));
    }
    
    $scope.saveBus = function() {
        var bus_pisos = [];
        for (var i = 0; i < $scope.bus.nro_pisos; i++) {
            var nro_asientos = $(".panel" + i).find(".draggable").length;
            var bus_piso = {
                bus_id: $scope.bus.id,
                nro_piso: i + 1,
                imagen: $scope.imgUrl[i],
                nro_asientos: nro_asientos,
                bus_asientos: []
            };
            $(".panel" + i).find(".draggable").each(function() {
                var bus_asiento = {
                    nro_asiento: $(this).find("span").text(),
                    x: $(this).css("left").substring(0, $(this).css("left").length - 2),
                    y: $(this).css("top").substring(0, $(this).css("top").length - 2),
                    estado_id: 1
                };
                bus_piso.bus_asientos.push(bus_asiento);
            });
            bus_pisos.push(bus_piso);
        }
        BusPisosService.save(bus_pisos, function(data) {
            console.log(data);
        })
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("BusesService", function($resource) {
    /*var busesService = {};
    
    busesService.list = function() {
        var buses = $resource("http://localhost:8000/venta-pasajes/buses.json");
        return buses.get();
    };
    
    busesService.add = function(newBus) {
        var buses = $resource("http://localhost:8000/venta-pasajes/buses.json");
        var bus = buses.save(newBus);
        console.log(bus);
    };
    
    return busesService;*/
    return $resource('http://localhost:8000/venta-pasajes/buses/:id.json');
});
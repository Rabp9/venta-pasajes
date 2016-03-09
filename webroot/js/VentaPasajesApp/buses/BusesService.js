var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("BusesService", function($http) {
    var busesService = {};
    busesService.buses = [];
    
    busesService.list = function() {
        $http.get("http://localhost:8000/venta-pasajes/buses.json")
            .success(function (data) {
                busesService.buses = data;
            })
            .error(function (error, status, headers, config) {
                console.log(error);
            })
    };
    
    busesService.add = function(newBus) {
        busesService.buses.push(newBus);
        // http insert
        
    };
    
    return busesService;
});
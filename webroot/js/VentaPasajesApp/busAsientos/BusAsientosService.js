var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("BusAsientosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "bus_asientos/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
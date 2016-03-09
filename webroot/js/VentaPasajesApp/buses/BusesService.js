var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("BusesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "venta-pasajes/buses/:id.json");
});
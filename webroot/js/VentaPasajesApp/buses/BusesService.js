var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("BusesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "buses/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
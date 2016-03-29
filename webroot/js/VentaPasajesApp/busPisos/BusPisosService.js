var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("BusPisosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "bus_pisos/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
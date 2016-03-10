var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("RutasService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "rutas/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
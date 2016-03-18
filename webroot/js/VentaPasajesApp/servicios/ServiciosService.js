var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("ServiciosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "servicios/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
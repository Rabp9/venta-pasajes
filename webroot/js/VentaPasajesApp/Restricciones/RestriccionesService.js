var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("RestriccionesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "restricciones/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        saveMany: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "restricciones/saveMany/.json"
        }
    });
});
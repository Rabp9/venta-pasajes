var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("AgenciasService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "agencias/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
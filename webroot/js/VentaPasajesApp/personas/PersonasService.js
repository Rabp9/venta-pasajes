var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("PersonasService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "personas/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        findByDni: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "personas/findByDni/:dni.json"
        }
    });
});
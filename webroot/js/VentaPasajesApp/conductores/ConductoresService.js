var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("ConductoresService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "conductores/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        findByDni: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "conductores/findByDni/:dni.json"
        }
    });
});
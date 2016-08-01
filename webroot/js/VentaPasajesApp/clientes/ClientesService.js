var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("ClientesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "clientes/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        findByRuc: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "clientes/findByRuc/:ruc.json"
        }
    });
});
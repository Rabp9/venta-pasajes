var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("TarifasService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "tarifas/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }, 
        findByOrigenDestino: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "tarifas/index/:servicio/:origen/:destino.json"
        }
    });
});
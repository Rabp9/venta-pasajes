var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("DesplazamientosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "desplazamientos/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }, 
        findByOrigenDestino: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "desplazamientos/index/:origen/:destino.json"
        },
        getByOrigenAndDestino: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "desplazamientos/getByOrigenAndDestino/:origen/:destino/.json"
        }
    });
});
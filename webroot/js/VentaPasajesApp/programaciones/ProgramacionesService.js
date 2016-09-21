var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("ProgramacionesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "programaciones/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        getByFechaByOrigenByDestino: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "programaciones/getByFechaByOrigenByDestino/.json"
        },
        getDisponibles: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "programaciones/getDisponibles/.json"
        },
        getAnteriores: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "programaciones/getAnteriores/.json"
        }
    });
});
var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("ProgramacionesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "programaciones/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        getByFechaByOrigenByDestino: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "programaciones/getByFechaByOrigenByDestino/.json"
        }
    });
});
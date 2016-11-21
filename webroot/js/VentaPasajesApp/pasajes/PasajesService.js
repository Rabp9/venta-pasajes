var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("PasajesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "pasajes/:id.json", {id:'@id'}, {
        getEstado: {
            method: "GET",
            url: VentaPasajesApp.path_location + "pasajes/getEstado/:bus_asiento_id/:programacion_id/:detalle_desplazamiento_id.json"
        },
        getNextNroDoc: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "pasajes/getNextNroDoc/.json"
        },
        getForPrint: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "pasajes/getForPrint/:programacion_id/:detalle_desplazamiento_id/:bus_asiento_id/.json"
        },
        cancel: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "pasajes/cancel/.json"
        },
        getData: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "pasajes/getData/:bus_asiento_id/:programacion_id/:detalle_desplazamiento_id.json"
        }
    });
});
var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("DetalleDesplazamientosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "detalle_desplazamientos/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        getByRutaAndDesplazamiento: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "detalle_desplazamientos/getByRutaAndDesplazamiento/:ruta_id/:desplazamiento_id/.json",
        }
    });
});
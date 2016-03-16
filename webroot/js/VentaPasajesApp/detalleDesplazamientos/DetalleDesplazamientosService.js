var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("DetalleDesplazamientosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "detalle_desplazamientos/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
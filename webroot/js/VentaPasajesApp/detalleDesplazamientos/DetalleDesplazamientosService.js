var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("DetalleDesplazamientosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "detalleDesplazamientos/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
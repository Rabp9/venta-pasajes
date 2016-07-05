var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("TipoProductosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "tipo_productos/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
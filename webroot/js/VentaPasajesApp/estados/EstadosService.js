var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("EstadosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "estados/:id.json");
});
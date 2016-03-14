var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("UbigeosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "ubigeos/:id.json");
});
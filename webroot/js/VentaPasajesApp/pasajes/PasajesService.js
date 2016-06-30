var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("PasajesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "pasajes/:id.json", {id:'@id'});
});
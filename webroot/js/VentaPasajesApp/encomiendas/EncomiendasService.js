var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("EncomiendasService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "encomiendas/:id.json", {id:'@id'});
});
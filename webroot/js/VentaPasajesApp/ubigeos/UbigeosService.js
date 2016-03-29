var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("UbigeosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "ubigeos/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        findByParent: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "ubigeos/findByParent/:parent_id.json",
        }
    });
});
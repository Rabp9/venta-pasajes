var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("GroupsService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "groups/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        }
    });
});
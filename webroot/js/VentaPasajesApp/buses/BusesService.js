var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("BusesService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "buses/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        subir: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "buses/subir/.json",
            transformRequest: angular.identity,
            headers: { 'Content-Type': undefined }
        }
    });
});
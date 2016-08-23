var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("ImportarService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "importar/:id.json", {id:'@id'}, {
        preLoad: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "importar/preLoad/.json",
            transformRequest: angular.identity,
            headers: { 'Content-Type': undefined }
        },
        import: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "importar/import/.json",
            transformRequest: angular.identity,
            headers: { 'Content-Type': undefined }
        }
    });
});
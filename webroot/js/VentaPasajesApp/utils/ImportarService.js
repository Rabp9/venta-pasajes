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
        },
        export: {
            method: 'POST',
            url: VentaPasajesApp.path_location + 'importar/export/.json'
        },
        getExportCountClientes: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "importar/getExportCountClientes/.json"
        },
        getExportCountPasajes: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "importar/getExportCountPasajes/.json"
        },
        getExportCountGiros: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "importar/getExportCountGiros/.json"
        },
        getExportCountEncomiendas: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "importar/getExportCountEncomiendas/.json"
        }
    });
});
var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("EncomiendasService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "encomiendas/:id.json", {id:'@id'}, {
        asignar: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "encomiendas/asignar/.json",
        },
        getPendientes: {
            method: "GET",
            url: VentaPasajesApp.path_location + "encomiendas/getPendientes/.json"
        },
        getSinEntregar: {
            method: "GET",
            url: VentaPasajesApp.path_location + "encomiendas/getSinEntregar/.json"
        }
    });
});
var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("GirosService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "giros/:id.json", {id:'@id'}, {
        asignar: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "giros/asignar/.json",
        },
        llamar: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "giros/llamar/.json",
        },
        getPendientes: {
            method: "GET",
            url: VentaPasajesApp.path_location + "giros/getPendientes/.json"
        },
        getSinEntregar: {
            method: "GET",
            url: VentaPasajesApp.path_location + "giros/getSinEntregar/.json"
        },
        cancelarAsignacion: {
            method: "POST",
            url: VentaPasajesApp.path_location + "giros/cancelarAsignacion/.json"
        },
        registrarEntrega: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "giros/registrarEntrega/.json"
        },
        getNextNroDoc: {
            method: 'GET',
            url: VentaPasajesApp.path_location + "giros/getNextNroDoc/.json"
        }
    });
});
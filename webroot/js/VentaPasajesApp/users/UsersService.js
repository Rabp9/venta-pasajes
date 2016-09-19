var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.factory("UsersService", function($resource) {
    return $resource(VentaPasajesApp.path_location + "users/:id.json", {id:'@id'}, {
        update: {
            method: 'PUT'
        },
        login: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "users/login/.json"
        },
        manage: {
            method: 'POST',
            url: VentaPasajesApp.path_location + "users/manage/.json"
        }
    });
});
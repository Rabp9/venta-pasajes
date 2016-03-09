var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListBusesController", function($scope, $resource) {
    buses = $resource("http://localhost:8000/venta-pasajes/buses/:id.json", {id: "@id"});
    $scope.buses = buses.query();
});
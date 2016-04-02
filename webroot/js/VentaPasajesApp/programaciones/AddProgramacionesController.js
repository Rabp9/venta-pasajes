var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddProgramacionesController", function($scope, ProgramacionesService, BusesService, RutasService, ServiciosService, ConductoresService, EstadosService) {  
    BusesService.get(function(data) {
        $scope.buses = data.buses;
    });
    
    RutasService.get(function(data) {
        $scope.rutas = data.rutas;
    });
    
    ServiciosService.get(function(data) {
        $scope.servicios = data.servicios;
    });
    
    ConductoresService.get(function(data) {
        $scope.conductores = data.conductores;
    });
    
    EstadosService.get(function(data) {
        $scope.estados = data.estados;
    });
    
    $scope.onBusSelected = function() {
        BusesService.get({id: $scope.programacion.bus_id}, function(data) {
            $scope.busSelected = data.bus;
        })
    };
    
    $scope.onRutaSelected = function() {
        RutasService.get({id: $scope.programacion.ruta_id}, function(data) {
            $scope.rutaSelected = data.ruta;
        })
    };
    
    $scope.onServicioSelected = function() {
        ServiciosService.get({id: $scope.programacion.servicio_id}, function(data) {
            $scope.servicioSelected = data.servicio;
        })
    };
    
    $scope.onConductoresSelected = function() {
        ConductoresService.getMany($scope.programacion.conductores, function(data) {
            $scope.conductoresSelected = data.conductores;
        })
    };
});
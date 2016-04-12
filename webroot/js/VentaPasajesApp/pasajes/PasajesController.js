var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("PasajesController", function($scope, AgenciasService, ProgramacionesService, $filter) {
    $scope.searching = false;
    $scope.reverse = false;
    $scope.predicate = "id";
    
    $scope.agencias = AgenciasService.get(function() {
        $scope.agencias = $scope.agencias.agencias;
    });
    
    $scope.onSearchChange = function() {
        if ($scope.fecha == null) {
            return;
        }
        if ($scope.origen_selected == null) {
            return;
        }
        if ($scope.destino_selected == null) {
            return;
        }
        $scope.searching = true;
        var fecha = $filter("date")($scope.fecha, "yyyy-MM-dd");
        
        $scope.loading = true;
        ProgramacionesService.getByFechaByOrigenByDestino({
            fecha: fecha,
            origen: $scope.origen_selected,
            destino: $scope.destino_selected
        }, function(data) {
            $scope.programaciones = data.programaciones;
            $scope.loading = false;
        });
    }
    
    $scope.onProgramacionSelect = function(programacion_id) {
        ProgramacionesService.get({id: programacion_id}, function(data) {
            $scope.programacion_selected = data.programacion;
        });
    }
    
});
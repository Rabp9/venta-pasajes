var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListRutasController", function($scope, RutasService, AgenciasService) {
    $scope.rutas = {};  
    $scope.agencias = {};
    $scope.ruta_selected = [];
    $scope.detalle_desplazamiento = [];
    $scope.next_origen = [];
    $scope.modalUrl = "";
    
    $scope.list = function() {
        $scope.rutas = RutasService.get(function() {
            $scope.rutas = $scope.rutas.rutas;
        });
        $scope.agencias = AgenciasService.get(function() {
            $scope.agencias = $scope.agencias.agencias;
        });
    };
    
    $scope.loadDesplazamientos = function(id) {
        RutasService.get({id: id}, function(data) {
           $scope.ruta_selected = data.ruta;
        });
    };
    
    $scope.addDesplazamiento = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "DetalleDesplazamientos/add";
    }
    
    $scope.addRuta = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "rutas/add";
    }
    
    $scope.list();
    
    $("#mdlRutas").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $scope.modalUrl = "";
        });
    });
    
    $scope.openModal = function() {
        $("#mdlRutas").modal("toggle");
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListRutasController", function($scope, RutasService, AgenciasService) {
    $scope.rutas = {};  
    $scope.agencias = {};
    $scope.loading_rutas = true;
    $scope.ruta_selected = [];
    $scope.detalle_desplazamiento = [];
    $scope.next_origen = [];
    $scope.modalUrl = "";
    
    $scope.list = function() {
        $scope.loading_rutas = true;
        $scope.rutas = RutasService.get(function() {
            $scope.rutas = $scope.rutas.rutas;
            $scope.loading_rutas = false;
        });
        $scope.agencias = AgenciasService.get(function() {
            $scope.agencias = $scope.agencias.agencias;
        });
    };
    
    $scope.loadDesplazamientos = function($event, id) {
        $("#ulRutas").find("li").removeClass("active");
        $($event.currentTarget).parent().addClass("active");
        $scope.fetchDesplazamientos(id);
    };
    
    $scope.fetchDesplazamientos = function(id) {
        $scope.loading_ruta_selected = true;
        RutasService.get({id: id}, function(data) {
            $scope.ruta_selected = data.ruta;
            $scope.loading_ruta_selected = false;
        });
    }
    
    $scope.addDesplazamiento = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "DetalleDesplazamientos/add";
        $scope.modal_grande = false;
    }
    
    $scope.addRuta = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "rutas/add";
        $scope.modal_grande = false;
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
    
    $scope.setRestricciones = function() {
        $scope.modalUrl = VentaPasajesApp.path_location + "detalleDesplazamientos/setRestricciones";
        $scope.modal_grande = true;
    }
});
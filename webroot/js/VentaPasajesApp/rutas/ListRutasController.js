var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListRutasController", function($scope, RutasService, AgenciasService, DetalleDesplazamientosService) {
    $scope.rutas = {};  
    $scope.agencias = {};
    $scope.loading_rutas = true;
    $scope.ruta_selected = [];
    $scope.detalle_desplazamiento = [];
    $scope.next_origen = [];
    $scope.modalRutasUrl = "";
    $scope.modalDesplazamientosUrl = "";
    $scope.modalRestriccionesUrl = "";
    $scope.modalEditRutaUrl = "";
    $scope.message = {};
    
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
        $("#dvRutas").find("a").removeClass("active");
        $($event.currentTarget).addClass("active");
        $scope.fetchDesplazamientos(id);
    };
    
    $scope.fetchDesplazamientos = function(id) {
        $scope.loading_ruta_selected = true;
        RutasService.get({id: id}, function(data) {
            $scope.ruta_selected = data.ruta;
            $scope.loading_ruta_selected = false;
        });
    }
    
    $scope.addRuta = function() {
        $('#btnAddRuta').addClass("disabled");
        $("#btnAddRuta").attr("disabled", true);
        $scope.modalRutasUrl = VentaPasajesApp.path_location + "rutas/add";
    }
    
    $scope.addDesplazamiento = function() {
        $('#btnAddDesplazamientos').addClass("disabled");
        $("#btnAddDesplazamientos").attr("disabled", true);
        $scope.modalDesplazamientosUrl = VentaPasajesApp.path_location + "DetalleDesplazamientos/add";
    }
    
    $scope.editRuta = function(ruta_id, $event) {
        $scope.modalEditRutaUrl = VentaPasajesApp.path_location + "Rutas/edit/" + ruta_id;
        $scope.ruta_id_selected = ruta_id;
        $event.stopPropagation();
    }
    
    $scope.removeRuta = function(ruta_id, $event) {
        if (confirm('¿Estás seguro de eliminar esta Ruta?')) {
            var ruta = RutasService.get({id: ruta_id}, function() {
                ruta.estado_id = 2;
                delete ruta.estado;
                delete ruta.detalleDesplazamientos;
                ruta.$update({id: ruta_id}, function(data) {
                    $scope.actualizarMessage(data.message);
                    $scope.list();
                    $scope.ruta_selected = [];
                });
            });
        }
        $event.stopPropagation();
    }
    
    $scope.removeDetalleDesplazamiento = function(detalleDesplazamiento_id, $event) {
        if (confirm('¿Estás seguro de eliminar este desplazamiento?')) {
            DetalleDesplazamientosService.delete({id: detalleDesplazamiento_id}, function(data) {
                $scope.message = data.message;
                if ($scope.message.type == 'success') {
                    angular.element($event.target).parent().parent().parent().remove();
                }
            });
        }
    }
    
    $scope.list();
    
    $("#mdlRutas").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $('#btnAddRuta').removeClass("disabled");
            $("#btnAddRuta").attr("disabled", false);
            $scope.modalRutasUrl = "";
        });
    });
    
    $("#mdlEditRuta").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $scope.modalEditRutaUrl = "";
        });
    });
    
    $("#mdlDesplazamientos").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $('#btnAddDesplazamientos').removeClass("disabled");
            $("#btnAddDesplazamientos").attr("disabled", false);
            $scope.modalDesplazamientosUrl = "";
        });
    });
    
    $("#mdlRestricciones").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $('#btnSetRestricciones').removeClass("disabled");
            $("#btnSetRestricciones").attr("disabled", false);
            $scope.modalRestriccionesUrl = "";
        });
    });
    
    $scope.openModalRutas = function() {
        $("#mdlRutas").modal("toggle");
    };
    
    $scope.openModalEditRuta = function() {
        $('#mdlEditRuta').modal('toggle');
    };
    
    $scope.openModalDesplazamientos = function() {
        $("#mdlDesplazamientos").modal("toggle");
    };
    
    $scope.openModalRestricciones = function() {
        $("#mdlRestricciones").modal("toggle");
    };
    
    $scope.setRestricciones = function() {
        if ($scope.ruta_selected.detalle_desplazamientos.length) {
            $('#btnSetRestricciones').addClass("disabled");
            $("#btnSetRestricciones").attr("disabled", true);
            $scope.modalRestriccionesUrl = VentaPasajesApp.path_location + "detalleDesplazamientos/setRestricciones";
        } else {
            alert('No ha agregado desplazamientos aún');
        }
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    };
    
    $scope.acutalizarRutaSelected = function(rutaSelected) {
        $scope.ruta_selected = rutaSelected;
    };
});
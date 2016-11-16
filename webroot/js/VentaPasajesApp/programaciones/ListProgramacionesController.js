var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListProgramacionesController", function($scope, ProgramacionesService, $window, ServiciosService) {
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = {};
    $scope.modalProgramacionesAddUrl = '';
    $scope.modalRegistrarSalidaUrl = '';
    $scope.tipo = 1;
    
    $("#txtBuscarFecha").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onSelect: function(dateText) {
            $scope.search_fecha = dateText;
            $scope.$apply();
        }
    });
    
    $scope.openProgramacionesAddModal = function() {
        $("#mdlProgramacionesAdd").modal("toggle");
    };
    
    $scope.openRegistrarSalidaModal = function() {
        $("#mdlRegistrarSalida").modal("toggle");
    };
    
    $("#mdlProgramacionesAdd").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $('#aProgramacionesAdd').removeClass('disabled');
            $('#aProgramacionesAdd').prop('disabled', false);
            $scope.modalProgramacionesAddUrl = "";
        });
    });
    
    $("#mdlRegistrarSalida").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $('#aRegistrarSalida').removeClass('disabled');
            $('#aRegistrarSalida').prop('disabled', false);
            $scope.modalRegistrarSalidaUrl = "";
        });
    });
    
    $scope.list = function() {
        $scope.programaciones = [];
        $scope.loading = true;
        ProgramacionesService.getDisponibles(function(data) {
            $scope.programaciones = data.programaciones;
            $scope.loading = false;
        });
        
        ServiciosService.get(function(data) {
            $scope.servicios = data.servicios;
        });
    };
    
    $scope.listAnteriores = function() {
        $scope.programaciones = [];
        $scope.loading = true;
        ProgramacionesService.getAnteriores(function(data) {
            $scope.programaciones = data.programaciones;
            $scope.loading = false;
        });
        
        ServiciosService.get(function(data) {
            $scope.servicios = data.servicios;
        });
    };
    
    $scope.cambiar = function(tipo) {
        if (tipo == 1) {
            $scope.list();
        } else {
            $scope.listAnteriores();
        }
    }
    
    $scope.showListPasajeros = function(programacion_id) {
        $window.open('pasajes/getByProgramacion/' + programacion_id, '_blank');
    }
    
    $scope.registrarSalida = function(programacion_id) {
        $('.btn-registrar-salida').addClass('disabled');
        $('.btn-registrar-salida').prop('disabled', true);
        $scope.modalRegistrarSalidaUrl = VentaPasajesApp.path_location + "programaciones/registrarSalida";
    }
    
    $scope.showListEncomiendas = function(programacion_id) {
        $window.open('encomiendas/getByProgramacion/' + programacion_id, '_blank');
    }
    
    $scope.addProgramacion= function() {
        $('#aProgramacionesAdd').addClass('disabled');
        $('#aProgramacionesAdd').prop('disabled', true);
        $scope.modalProgramacionesAddUrl = VentaPasajesApp.path_location + "programaciones/add";
    };
    
    $scope.filter_programaciones = function (item) {
        var servicio = $scope.search_servicio ? item.servicio.id == $scope.search_servicio : true;
        var placa = $scope.search_placa ? item.bus.placa.toLowerCase().search($scope.search_placa.toLowerCase()) >= 0 : true;
        var fecha = $scope.search_fecha ? item.fechahora_prog.search($scope.search_fecha) >= 0 : true;

        return servicio && placa && fecha;
    };
    
    $scope.actualizarMessage = function(message) {
        $scope.message = message;
    };
    
    $scope.list();
});
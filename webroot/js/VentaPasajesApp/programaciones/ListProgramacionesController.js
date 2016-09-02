var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("ListProgramacionesController", function($scope, ProgramacionesService, $routeParams, $window, ServiciosService) {
    $scope.reverse = false;
    $scope.predicate = "id";
    $scope.message = {};
    $scope.modalProgramacionesAddUrl = '';
    
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
    }
    
    $("#mdlProgramacionesAdd").on("hidden.bs.modal", function(e) {
        $scope.$apply(function() {
            $scope.modalProgramacionesAddUrl = "";
        });
    });
    
    
    $scope.list = function() {
        $scope.loading = true;
        ProgramacionesService.get(function(data) {
            $scope.programaciones = data.programaciones;
            $scope.loading = false;
        });
        
        if ($routeParams.type !== null) {
            $scope.message.type = $routeParams.type;
            $scope.message.text = $routeParams.text;
        }
        
        ServiciosService.get(function(data) {
            $scope.servicios = data.servicios;
        });
    };
    
    $scope.showList = function(programacion_id) {
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
    
    $scope.list();
});
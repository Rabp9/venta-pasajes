var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("RegistrarSalidaController", function($scope, ProgramacionesService) {
    
    $scope.save = function() {
        $("#btnRegistrarProgramacion").addClass("disabled");
        $("#btnRegistrarProgramacion").attr("disabled", true);
        angular.forEach($scope.conductoresSelected, function(value, key) {
            var conductor = value;
            $scope.programacion.detalle_conductores[key].conductor_id = conductor.id;
        });
        $scope.programacion.fechahora_prog = $filter("date")($scope.prefechahora_prog, "yyyy-MM-dd HH:mm:ss");
        $scope.programacion.estado_id = 1;
        ProgramacionesService.save($scope.programacion, function(data) {
            $('#aProgramacionesAdd').removeClass('disabled');
            $('#aProgramacionesAdd').prop('disabled', false);
            
            $("#mdlProgramacionesAdd").modal('toggle');
            $scope.$parent.actualizarMessage(data.message);
            $("#btnRegistrarProgramacion").removeClass("disabled");
            $("#btnRegistrarProgramacion").attr("disabled", false);
            $scope.list();
        })
    };
});
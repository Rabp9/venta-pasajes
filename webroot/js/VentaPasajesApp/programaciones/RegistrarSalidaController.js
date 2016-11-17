var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("RegistrarSalidaController", function($scope, ProgramacionesService, $filter) {
    
    $scope.save = function(programacion_id) {
        $("#btnRegistrarSalida").addClass("disabled");
        $("#btnRegistrarSalida").attr("disabled", true); 
        
        var fecha_via = $filter("date")($scope.preFecha_via, "yyyy-MM-dd HH:mm:ss");
        ProgramacionesService.registrarSalidaPost({
            programacion_id: programacion_id,
            fecha_via: fecha_via
        }, function(data) {
            console.log(data);
            $('.btn-registrar-salida').removeClass('disabled');
            $('.btn-registrar-salida').prop('disabled', false);
            
            $("#mdlRegistrarSalida").modal('toggle');
            $scope.$parent.actualizarMessage(data.message);
            $("#btnRegistrarSalida").removeClass("disabled");
            $("#btnRegistrarSalida").attr("disabled", false);
            $scope.$parent.cambiar();
        })
    };
});
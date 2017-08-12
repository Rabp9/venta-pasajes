var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.controller("AddPersonasController", function($scope, PersonasService, $filter) {
    $scope.newPersona = new PersonasService();
    $scope.response = {};
    $scope.response.type = 'error';
    
    $("#fecha_nac").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onSelect: function(dateText) {
            $scope.prefecha_nac = dateText;
            $scope.$apply();
        }
    });
    
    $scope.addPersona = function() {
        $("#btnRegistrar").addClass("disabled");
        $("#btnRegistrar").prop("disabled", true);
        if ($scope.prefecha_nac) {
            $scope.newPersona.fecha_nac = $filter("date")($scope.prefecha_nac, "yyyy-MM-dd");
        }
        PersonasService.save($scope.newPersona, function(data) {
            $("#mdlPersonas").modal('toggle');
            $scope.newPersona = new PersonasService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });
    };
    
    $scope.blurDni = function(dni) {
        PersonasService.findByDni({dni: dni}, function(data) {
            if (data.persona === null) {
                $scope.response = {
                    type: 'success',
                    message: 'DNI disponible'
                };
            } else {
                $scope.response = {
                    type: 'error',
                    message: 'El DNI no está disponible'
                };
            }
        });
    }
});
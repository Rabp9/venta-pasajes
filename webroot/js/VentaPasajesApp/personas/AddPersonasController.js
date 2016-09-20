var VentaPasajesApp = angular.module("VentaPasajesApp");
VentaPasajesApp.controller("AddPersonasController", function($scope, PersonasService, $filter) {
    $scope.newPersona = new PersonasService();
    
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
        $scope.newPersona.fecha_nac = $filter("date")($scope.prefecha_nac, "yyyy-MM-dd");
        PersonasService.save($scope.newPersona, function(data) {
            $("#mdlPersonas").modal('toggle');
            $scope.newPersona = new PersonasService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });
    };
});
VentaPasajesApp.controller("AddConductoresController", function($scope, ConductoresService, PersonasService) {
    $scope.newConductor = new ConductoresService();
    $scope.newConductor.estado_id = 1;
    $scope.dni = "";
    $scope.persona = new PersonasService();
    
    $scope.buscarPersona = function() {
        $('#btnBuscarPersona').addClass('disabled');
        $('#btnBuscarPersona').prop('disabled', true);
        PersonasService.findByDni({dni: $scope.dni}, function(data) {
            $scope.persona = data.persona;
            $('#btnBuscarPersona').removeClass('disabled');
            $('#btnBuscarPersona').prop('disabled', false);
        });
    }
    
    $scope.addConductor = function() {
        $scope.newConductor.persona_id = $scope.persona.id;
        $("#btnRegistrar").addClass("disabled");
        $("#btnRegistrar").prop("disabled", true);
        ConductoresService.save($scope.newConductor, function(data) {
            $("#mdlConductores").modal('toggle');
            $scope.newConductor = new ConductoresService();
            $scope.$parent.actualizarMessage(data.message);
            $scope.$parent.list();
        });;
    }
});
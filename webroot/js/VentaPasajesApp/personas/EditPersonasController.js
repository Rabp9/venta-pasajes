VentaPasajesApp.controller("EditPersonasController", function($scope, PersonasService, $filter) {
    PersonasService.get({ id: $scope.$parent.id }, function(data) {
        $scope.editPersona = data.persona;
        $scope.editPersona.fecha_nac = $filter("date")($scope.editPersona.fecha_nac, "yyyy-MM-dd");
    });
    
    $("#fecha_nac").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onSelect: function(dateText) {
            $scope.prefecha_nac = dateText;
            $scope.$apply();
        }
    });
    
    $scope.updatePersona = function() {
        $('#btnRegistrarPersona').addClass('disabled');
        $('#btnRegistrarPersona').prop('disabled', true);
        $scope.editPersona.fecha_nac = $filter("date")($scope.prefecha_nac, "yyyy-MM-dd");
        var persona = PersonasService.get({id: $scope.$parent.id}, function() {
            persona = angular.extend(persona, $scope.editPersona);
           
            persona.$update({id: $scope.$parent.id}, function() {
                $("#mdlPersonas").modal('toggle');
                $scope.$parent.list();
            });
        });
    }
});
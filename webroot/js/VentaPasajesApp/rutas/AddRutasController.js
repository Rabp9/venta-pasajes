var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("AddRutasController", function($scope, RutasService) {
    $scope.newRuta = new RutasService();
    
    $scope.addRuta = function() {
        $('#btnAddRegistrarRuta').addClass("disabled");
        $("#btnAddRegistrarRuta").attr("disabled", true);
        RutasService.save($scope.newRuta, function(data) {
            $scope.newRuta = new RutasService();
            $scope.$parent.list();
            $scope.$parent.actualizarMessage(data.message);
            $("#mdlRutas").modal('toggle');
            
            $('#btnAddRegistrarRuta').removeClass("disabled");
            $("#btnAddRegistrarRuta").attr("disabled", false);
            
            $('#btnAddRuta').removeClass("disabled");
            $("#btnAddRuta").attr("disabled", false);
        });
    }
});
var VentaPasajesApp = angular.module("VentaPasajesApp");

VentaPasajesApp.controller("EditRutasController", function($scope, RutasService) {
    RutasService.get({id: $scope.$parent.ruta_id_selected}, function(data) {
        $scope.editRuta = data.ruta;
    });
    
    $scope.updateRuta = function() {        
        $("#btnEditRegistrarRuta").addClass("disabled");
        $("#btnEditRegistrarRuta").prop("disabled", true);
        var ruta = RutasService.get({id: $scope.editRuta.id}, function() {
            delete ruta.estado;
            delete ruta.detalleDesplazamientos;
            ruta.descripcion = $scope.editRuta.descripcion;
            
            ruta.$update({id: $scope.editRuta.id}, function(data) {
                $("#mdlEditRuta").modal('toggle');
                $scope.$parent.actualizarMessage(data.message);
                $scope.$parent.list();
                $scope.$parent.acutalizarRutaSelected([]);

                $("#btnEditRegistrarRuta").removeClass("disabled");
                $("#btnEditRegistrarRuta").prop("disabled", false);
            });
        });
    }
});
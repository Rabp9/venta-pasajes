<!-- src/Template/DetalleDesplazamientos/setRestricciones.ctp -->
<div ng-controller="SetRestriccionesController">
    <form ng-submit="setRestricciones()">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Establecer Restricciones</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table-responsive table-bordered">
                            <tr>
                                <td> </td>
                                <td ng-repeat="desplazamiento_x in desplazamientos_x">
                                    Cod. Des. {{desplazamiento_x.id}}
                                </td>
                            </tr>
                            <tr ng-repeat="desplazamiento_y in desplazamientos_y">
                                <td>
                                    Cod. Des. {{desplazamiento_y.id}}
                                </td>
                                <td ng-repeat="desplazamiento_x in desplazamientos_x">
                                    <input ng-disabled="$index == $parent.$index" type="checkbox" ng-model="restricciones[($index + $parent.$index + $index * 2).toString()].valor">
                                </td>
                            </tr>
                        </table>
                        <h4>Leyenda</h4>
                        <table class="table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="desplazamiento in desplazamientos_x">
                                    <td>{{desplazamiento.id}}</td>
                                    <td>{{desplazamiento.desplazamiento.AgenciaOrigen.direccion }} ({{desplazamiento.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                    <td>{{desplazamiento.desplazamiento.AgenciaDestino.direccion }} ({{desplazamiento.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>
</div>
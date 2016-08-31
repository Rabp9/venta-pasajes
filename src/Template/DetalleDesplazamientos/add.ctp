<!-- src/Template/DetalleDesplazamientos/add.ctp -->
<div ng-controller="AddDetalleDesplazamientosController">
    <form ng-submit="addDetalleDesplazamiento()">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Desplazamiento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label for="txtRuta">Ruta</label>
                            <input id="txtRuta" readonly type="text" class="form-control" ng-model="$parent.ruta_selected.descripcion" />
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sltOrigen">Origen</label>
                                    <select id="sltOrigen" class="form-control"
                                        ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                        ng-model="origen_selected" ng-change="onSelected()">
                                        <option value="">Selecciona una Agencia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sltDestino">Destino</label>
                                    <select id="sltDestino" class="form-control"
                                        ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                        ng-model="destino_selected" ng-change="onSelected()">
                                        <option value="">Selecciona una Agencia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <p ng-show="loading">Cargando...</p>
                        <p ng-show="desplazamiento == null && !loading">Desplazamiento no registrado</p>
                        <div ng-show="desplazamiento != null && !loading">
                            <div class="form-group">
                                <label for="txtDesplazamientoId">Código de Desplazamiento</label>
                                <input id="txtDesplazamientoId" type="text" ng-model="desplazamiento.id" class="form-control" readonly />
                            </div>
                            <p>Servicios actualmente disponibles:</p>
                            <ul>
                                <li ng-repeat="tarifa in desplazamiento.tarifas">
                                    {{tarifa.servicio.descripcion}} - (Precio: {{tarifa.precio_min}} - {{tarifa.precio_max}}, Tiempo: {{tarifa.tiempo}})
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btnRegistrarDesplazamiento" ng-show="desplazamiento != null && !loading" type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>
</div>
<!-- src/Template/Encomiendas/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Ventas");
$this->assign("title", "Encomiendas");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>

<form ng-submit="saveEncomienda()">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="dtFecha">Fecha</label>
                        <input id="txtFecha" class="form-control" type="text" ng-model="newEncomienda.fecha"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sltOrigen">Origen</label>
                        <select id="sltOrigen" class="form-control"
                            ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                            ng-model="origen_selected">
                            <option value="">Selecciona una Agencia</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sltDestino">Destino</label>
                        <select id="sltDestino" class="form-control"
                            ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                            ng-model="destino_selected">
                            <option value="">Selecciona una Agencia</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtRemitenteDni">Remitente</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="remitente_dni" type="search" maxlength="8">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" type="button" ng-click="buscarRemitente()"><samp class="glyphicon glyphicon-search"></samp> Buscar</button>
                            </div>
                        </div>
                    </div>
                    <span ng-show="searching">Buscando</span>
                    <span ng-show="remitente !== null">{{ remitente.full_name }}</span>
                    <span ng-hide="remitente !== null">No existe</span>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtDestinatarioDni">Destinatario</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="destinatario_dni" type="search" maxlength="8">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" type="button" ng-click="buscarDestinatario()"><samp class="glyphicon glyphicon-search"></samp> Buscar</button>
                            </div>
                        </div>
                    </div>
                    <span ng-show="searching">Buscando</span>
                    <span ng-show="destinatario !== null">{{ destinatario.full_name }}</span>
                    <span ng-hide="destinatario !== null">No existe</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3>Productos</h3>
                    <button type="button" class="btn btn-primary" ng-click="openFrmEncomiendaTipoAdd()"><span class="glyphicon glyphicon-plus"></span></button>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Detalle</th>
                                    <th>Valor Unitario</th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="encomienda_tipo in encomiendas_tipos">
                                    <td>{{encomienda_tipo.producto.descripcion}}</td>
                                    <td>{{encomienda_tipo.detalle}}</td>
                                    <td>{{encomienda_tipo.producto.valor}}</td>
                                    <td>{{encomienda_tipo.cantidad}}</td>
                                    <td>{{encomienda_tipo.cantidad * encomienda_tipo.producto.valor}}</td>
                                    <td><button type="button" class="btn btn-primary" ng-click="encomiendas_tipos.splice($index, 1);"><span class="glyphicon glyphicon-remove"></span></button></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td><input class="form-control" type="text" ng-model="newEncomienda.valor" ng-value="getTotal()"/></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Registrar</button>
</form>
<!-- Modal -->
<div class="modal fade" id="mdlEncomiendaTipoAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form ng-submit="addTipoProducto()">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                                <label for="sltProducto">Producto</label>
                                <select id="sltProducto" class="form-control"
                                    ng-options="tipo_producto as tipo_producto.descripcion for tipo_producto in tipo_productos"
                                    ng-model="newTipoProducto.producto">
                                    <option value="">Selecciona un Producto</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtDetalle">Detalle</label>
                                <input id="txtDetalle" type="text" class="form-control" ng-model="newTipoProducto.detalle">
                            </div>
                            <div class="form-group">
                                <label for="txtValor">Valor Unitario</label>
                                <input id="txtValor" type="text" class="form-control" ng-model="newTipoProducto.producto.valor" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nmbCantidad">Cantidad</label>
                                <input id="nmbCantidad" type="number" class="form-control" ng-model="newTipoProducto.cantidad">
                            </div>
                            <div class="form-group">
                                <label for="txtSubTotal">Sub Total</label>
                                <input id="txtSubTotal" type="text" class="form-control" value="{{getSubTotal()}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button id="btnRegistrar" type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
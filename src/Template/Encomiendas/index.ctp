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

<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="dtFecha">Fecha</label>
                    <input id="txtFecha" class="form-control" type="text" ng-model="fecha"
                        ng-keyup="onSearchChange()"/>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="sltOrigen">Origen</label>
                    <select id="sltOrigen" class="form-control"
                        ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                        ng-model="origen_selected" ng-change="onSearchChange()">
                        <option value="">Selecciona una Agencia</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="sltDestino">Destino</label>
                    <select id="sltDestino" class="form-control"
                        ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                        ng-model="destino_selected" ng-change="onSearchChange()">
                        <option value="">Selecciona una Agencia</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="marco_include">
            <div style="height: 25%; overflow:auto" class="justificado_not" id="busqueda">
                <div id="busqueda">
                    <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                        <thead>
                            <tr class="e34X" id="panel_status">
                                <th width="1%" align="center">
                                </th>
                                <th width="3%" align="center">
                                    <a ng-click="order('id')" style="cursor: pointer;">
                                        Código
                                        <span class="glyphicon" ng-show="predicate === 'id'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                                    </a>
                                </th>
                                <th width="6%" align="center">
                                    <a ng-click="order('ruta_id')" style="cursor: pointer;">
                                        Ruta
                                        <span class="glyphicon" ng-show="predicate === 'placa'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                                    </a>
                                </th>
                                <th width="8%" align="center">
                                    <a ng-click="order('servicio_id')" style="cursor: pointer;">
                                        Servicio
                                        <span class="glyphicon" ng-show="predicate === 'chasis'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                                    </a>
                                </th>
                                <th width="5%" align="center">
                                    <a ng-click="order('bus')" style="cursor: pointer;">
                                        Bus
                                        <span class="glyphicon" ng-show="predicate === 'asientos'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                                    </a>
                                </th>
                                <th width="5%" align="center">
                                    <a ng-click="order('fechahora_prog')" style="cursor: pointer;">
                                        Fecha y Hora
                                        <span class="glyphicon" ng-show="predicate === 'anio'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-show="!searching && (origen_selected == null || destino_selected == null || fecha == null)">
                                <td colspan="6">Especifique los criterios de bùsqueda</td>
                            </tr>
                            <tr ng-show="searching">
                                <td colspan="6">Cargando...</td>
                            </tr>
                            <tr ng-show="programaciones.length == 0 && !searching">
                                <td colspan="6">No hay registros de Programaciones</td>
                            </tr>
                            <tr ng-show="!searching" ng-repeat="programacion in programaciones | orderBy:predicate:reverse"
                                class="textnot2 animated" style="background-color: #fff;" 
                                onmouseover="style.backgroundColor='#cccccc';" 
                                onmouseout="style.backgroundColor='#fff'">

                                <td width="1%" bgcolor="#D6E4F2">
                                    <input type="radio" ng-click="onProgramacionSelect(programacion.id)"/>
                                </td>
                                <td width="3%" bgcolor="#D6E4F2">{{ programacion.id }}</td>
                                <td width="6%">{{ programacion.ruta.descripcion }}</td>
                                <td width="8%">{{ programacion.servicio.descripcion }}</td>
                                <td width="5%">{{ programacion.bus.placa }}</td>
                                <td width="5%">{{ programacion.fechahora_prog }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div ng-show="programacion_selected != null">
            <form>
                <div class="row">
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
                    <div class="col-md-12">
                        <h3>Productos</h3>
                        <button type="button" class="btn btn-primary" ng-click="openFrmEncomiendaTipoAdd()"><span class="glyphicon glyphicon-plus"></span></button>
                        <div class="table table-responsive table-striped">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Detalle</th>
                                        <th>Valor Unitario</th>
                                        <th>Cantidad</th>
                                        <th>Sub Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="encomienda_tipo in encomiendas_tipos">
                                        <td>{{encomienda_tipo.producto.descripcion}}</td>
                                        <td>{{encomienda_tipo.detalle}}</td>
                                        <td>{{encomienda_tipo.producto.valor}}</td>
                                        <td>{{encomienda_tipo.cantidad}}</td>
                                        <td>{{encomienda_tipo.cantidad * encomienda_tipo.producto.valor}}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Total</td>
                                        <td>{{getTotal()}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
                                <input id="txtSubTotal" type="text" class="form-control" ng-model="newTipoProducto.cantidad * newTipoProducto.producto.valor" readonly>
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

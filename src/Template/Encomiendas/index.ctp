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
<div>
    <!-- Nav tabs -->
    <ul id="ulTabs" class="nav nav-tabs" role="tablist" >
        <li role="presentation" class="active"><a data-target="#listpendientes" aria-controls="listpendientes" role="tab" data-toggle="tab">Encomiendas Pendientes</a></li>
        <li role="presentation"><a data-target="#new" aria-controls="new" role="tab" data-toggle="tab">Nueva Encomienda</a></li>
        <li role="presentation"><a data-target="#listsinentregar" aria-controls="listsinentregar" role="tab" data-toggle="tab">Encomiendas sin entregar</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="listpendientes">
            <div id="marco_include">
                <div style="height: 70%; overflow:auto" class="justificado_not" id="busqueda">
                    <div id="busqueda">
                        <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                            <thead>
                                <tr class="e34X" id="panel_status">
                                    <th width="3%" align="center">
                                        Código
                                    </th>
                                    <th width="6%" align="center">
                                        Origen
                                    </th>
                                    <th width="8%" align="center">
                                        Destino
                                    </th>
                                    <th width="5%" align="center">
                                        Remitente
                                    </th>
                                    <th width="5%" align="center">
                                        Destinatario
                                    </th>
                                    <th width="5%" align="center">
                                        Fecha y Hora
                                    </th>
                                    <th width="5%" align="center">
                                        Valor
                                    </th>
                                    <th width="4%" align="center">
                                        <button type="button" class="btn btn-primary" ng-click="asignar()">Asignar</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-show="loading">
                                    <td colspan="7">Cargando</td>
                                </tr>
                                <tr ng-show="encomiendas.length == 0 && !loading">
                                    <td colspan="7">No hay registros de Encomiendas</td>
                                </tr>
                                <tr ng-show="!loading" ng-repeat="encomienda in encomiendas | orderBy:'codigo'"
                                    class="textnot2 animated" style="background-color: #fff;" 
                                    onmouseover="style.backgroundColor='#cccccc';" 
                                    onmouseout="style.backgroundColor='#fff'">

                                    <td width="3%" bgcolor="#D6E4F2">{{ encomienda.id }}</td>
                                    <td width="8%">{{ encomienda.desplazamiento.AgenciaOrigen.direccion }} ({{ encomienda.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                    <td width="6%">{{ encomienda.desplazamiento.AgenciaDestino.direccion }} ({{ encomienda.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ encomienda.personaRemitente.full_name }}</td>
                                    <td width="5%">{{ encomienda.personaDestinatario.full_name }}</td>
                                    <td width="5%">{{ encomienda.fechahora }}</td>
                                    <td width="5%">{{ encomienda.valor }}</td>
                                    <td width="4%">
                                        <input type="checkbox" class="form-control" checklist-model="encomiendas_selected" checklist-value="encomienda.id"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="new">
            <form ng-submit="saveEncomienda()">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="dtFecha">Fecha</label>
                                    <input id="txtFecha" class="form-control" type="text" ng-model="newEncomienda.preFechahora"/>
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><input type="radio" ng-model="newEncomienda.tipodoc" value="boleta" /> Boleta</label>
                                    <label><input type="radio" ng-model="newEncomienda.tipodoc" value="factura" /> Factura</label>
                                </div>
                            </div>
                            <div ng-show="newEncomienda.tipodoc === 'factura'">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtRuc">RUC</label>
                                        <input id="txtRuc" class="form-control" type="text" ng-model="newEncomienda.ruc" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txtRazonSocial">Razón Social</label>
                                        <input id="txtRazonSocial" class="form-control" type="text" ng-model="newEncomienda.razonsocial" />
                                    </div>
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
                                            <tr ng-show="newEncomienda.tipodoc === 'factura'">
                                                <td colspan="4">Valor Neto</td>
                                                <td><input class="form-control" type="text" ng-model="newEncomienda.valor_neto" ng-value="getNeto()"/></td>
                                            </tr>
                                            <tr ng-show="newEncomienda.tipodoc === 'factura'">
                                                <td colspan="4">IGV</td>
                                                <td><input class="form-control" type="text" ng-model="newEncomienda.igv" ng-value="getIgv()"/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Valor Total</td>
                                                <td><input class="form-control" type="text" ng-model="newEncomienda.valor_total" ng-value="getTotal()"/></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="btnRegistrarEncomienda" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Registrar</button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="listsinentregar">
            <div id="marco_include">
                <div style="height: 70%; overflow:auto" class="justificado_not" id="busqueda">
                    <div id="busqueda">
                        <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                            <thead>
                                <tr class="e34X" id="panel_status">
                                    <th width="3%" align="center">
                                        Código
                                    </th>
                                    <th width="6%" align="center">
                                        Origen
                                    </th>
                                    <th width="8%" align="center">
                                        Destino
                                    </th>
                                    <th width="5%" align="center">
                                        Remitente
                                    </th>
                                    <th width="5%" align="center">
                                        Destinatario
                                    </th>
                                    <th width="5%" align="center">
                                        Fecha y Hora
                                    </th>
                                    <th width="5%" align="center">
                                        Valor
                                    </th>
                                    <th width="4%" align="center">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-show="loading_sin_entregar">
                                    <td colspan="7">Cargando</td>
                                </tr>
                                <tr ng-show="encomiendas_sin_entregar.length == 0 && !loading_sin_entregar">
                                    <td colspan="7">No hay registros de Encomiendas</td>
                                </tr>
                                <tr ng-show="!loading_sin_entregar" ng-repeat="encomienda in encomiendas_sin_entregar | orderBy:'codigo'"
                                    class="textnot2 animated" style="background-color: #fff;" 
                                    onmouseover="style.backgroundColor='#cccccc';" 
                                    onmouseout="style.backgroundColor='#fff'">

                                    <td width="3%" bgcolor="#D6E4F2">{{ encomienda.id }}</td>
                                    <td width="8%">{{ encomienda.desplazamiento.AgenciaOrigen.direccion }} ({{ encomienda.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                    <td width="6%">{{ encomienda.desplazamiento.AgenciaDestino.direccion }} ({{ encomienda.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ encomienda.personaRemitente.full_name }}</td>
                                    <td width="5%">{{ encomienda.personaDestinatario.full_name }}</td>
                                    <td width="5%">{{ encomienda.fechahora }}</td>
                                    <td width="5%">{{ encomienda.valor }}</td>
                                    <td width="4%">
                                        <a style="cursor: pointer;" ng-click="printBoleta(encomienda.id)" title="imprimir"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> |
                                        <a style="cursor: pointer;" ng-click="cancelarAsignacion(encomienda.id)" title="cancelar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a> |
                                        <a style="cursor: pointer;" ng-click="registrarEntrega(encomienda.id)" title="entregar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal mdlEncomiendaTipoAdd -->
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

<!-- Modal mdlEncomiendaTipoAdd -->
<div class="modal fade" id="mdlAsignarEncomiendas" tabindex="-1" role="dialog" aria-labelledby="Asignar Encomiendas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Asignar a Programación</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <select id="sltOrigen" class="form-control"
                                    ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                    ng-model="origen_selected" ng-change="onSearchChange()">
                                    <option value="">Selecciona un Origen</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select id="sltDestino" class="form-control"
                                    ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                    ng-model="destino_selected" ng-change="onSearchChange()">
                                    <option value="">Selecciona un Destino</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Bus</th>
                                        <th>Ruta</th>
                                        <th>Fecha y Hora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr ng-show="loading_programaciones">
                                        <td colspan="5">Cargando</td>
                                    </tr>
                                    <tr ng-show="programaciones_filtradas.length == 0 && !loading_programaciones">
                                        <td colspan="5">No hay Programaciones disponibles</td>
                                    </tr>
                                    <tr ng-show="!loading_programaciones" ng-repeat="programacion in programaciones_filtradas">
                                        <td>{{ programacion.id }}</td>
                                        <td>{{ programacion.bus.placa }}</td>
                                        <td>{{ programacion.ruta.descripcion }}</td>
                                        <td>{{ programacion.fechahora_prog | date: 'yyyy-MM-dd' }}</td>
                                        <td><button class="btn btn-primary" ng-click="registrarAsignacion(programacion.id)"><span class="glyphicon glyphicon-ok"></span></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
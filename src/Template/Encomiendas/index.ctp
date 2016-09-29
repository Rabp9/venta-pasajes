<!-- src/Template/Encomiendas/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Ventas");
$this->assign("title", "Encomiendas");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div>
    <!-- Nav tabs -->
    <ul id="ulTabs" class="nav nav-tabs" role="tablist" >
        <li role="presentation" class="active"><a data-target="#new" aria-controls="new" role="tab" data-toggle="tab">Nueva Encomienda</a></li>
        <li role="presentation"><a data-target="#listpendientes" aria-controls="listpendientes" role="tab" data-toggle="tab">Encomiendas sin asignar</a></li>
        <li role="presentation"><a data-target="#list" aria-controls="list" role="tab" data-toggle="tab">Lista de Encomiendas</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="new">
            <form ng-submit="saveEncomienda()">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <fieldset>
                                    <legend>Remitente y Destinatario</legend>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtRemitenteDni">Remitente (DNI)</label>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input class="form-control" ng-model="remitente_dni" type="search" maxlength="8" required>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button id="btnBuscarRemitente" class="btn btn-primary" type="button" ng-click="buscarRemitente()"><samp class="glyphicon glyphicon-search"></samp> Buscar</button>
                                                </div>
                                            </div>
                                            <span ng-show="searching">Buscando</span>
                                            <div class="dvPersonaEncontrada" ng-show="remitente != null">{{ remitente.full_name }}</div>
                                            <span ng-hide="remitente !== null">No existe</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtDestinatarioDni">Destinatario (DNi)</label>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input class="form-control" ng-model="destinatario_dni" type="search" maxlength="8">
                                                </div>
                                                <div class="col-sm-2">
                                                    <button id="btnBuscarDestinatario" class="btn btn-primary" type="button" ng-click="buscarDestinatario()"><samp class="glyphicon glyphicon-search"></samp> Buscar</button>
                                                </div>
                                            </div>
                                            <span ng-show="searching">Buscando</span>
                                            <div class="dvPersonaEncontrada" ng-show="destinatario != null">{{ destinatario.full_name }}</div>
                                            <span ng-hide="destinatario !== null">No existe</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Agencias</legend>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sltOrigen">Origen</label>
                                            <select id="sltOrigen" class="form-control"
                                                ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                                ng-model="origen_selected" required>
                                                <option value="">Selecciona una Agencia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sltDestino">Destino</label>
                                            <select id="sltDestino" class="form-control"
                                                ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                                ng-model="destino_selected" required>
                                                <option value="">Selecciona una Agencia</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-4">
                                <fieldset>
                                    <legend>Datos Adicionales</legend>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="txtFechaEncomiendas">Fecha de Registro</label>
                                            <input id="txtFechaEncomiendas" class="form-control" type="text" ng-model="newEncomienda.preFechahora"/>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Tipo de Documento</legend>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><input type="radio" ng-model="newEncomienda.tipodoc" value="boleta" /> Boleta</label>
                                            <label><input type="radio" ng-model="newEncomienda.tipodoc" value="factura" /> Factura</label>
                                            <input id="nro_doc" type="text" class="form-control" ng-model="newEncomienda.nro_doc" required style="display: inline; width: 15%; float: right;" /><label for="nro_doc" style="float: right; vertical-align: middle;">Nro Doc:</label>
                                        </div>
                                    </div>
                                    <div ng-show="newEncomienda.tipodoc === 'factura'">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txtRuc">RUC</label>
                                                <input id="txtRuc" class="form-control" type="text" ng-model="newEncomienda.ruc" ng-keyup="searchCliente()" maxlength="11" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtRazonSocial">Razón Social</label>
                                                <input id="txtRazonSocial" class="form-control" type="text" readonly ng-model="newEncomienda.cliente.razonsocial" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button id="btnAddCliente" type="button" class="btn btn-primary" ng-click="addPreCliente()"><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Condiciòn de Pago</legend>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><input type="radio" ng-model="newEncomienda.condicion" value="cancelado" /> Cancelado</label>
                                            <label><input type="radio" ng-model="newEncomienda.condicion" value="debe" /> Debe</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend>Productos</legend>
                                    <button id="btnAddDetalleProducto" type="button" class="btn btn-primary" ng-click="openFrmEncomiendaTipoAdd()"><span class="glyphicon glyphicon-plus"></span></button>
                                    <div class="table-responsive">
                                        <table class="table table-striped tblProductos">
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
                                                <tr class="trProducto" ng-repeat="encomienda_tipo in newEncomienda.encomiendas_tipos">
                                                    <td>{{encomienda_tipo.producto.descripcion}}</td>
                                                    <td>{{encomienda_tipo.detalle}}</td>
                                                    <td>{{encomienda_tipo.valor}}</td>
                                                    <td>{{encomienda_tipo.cantidad}}</td>
                                                    <td>{{encomienda_tipo.cantidad * encomienda_tipo.valor}}</td>
                                                    <td><button type="button" class="btn btn-primary" ng-click="cancelarPrdoucto($index)"><span class="glyphicon glyphicon-remove"></span></button></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr ng-show="newEncomienda.tipodoc === 'factura'">
                                                    <td colspan="4" style='text-align: right;'>Valor Neto</td>
                                                    <td><input class="form-control" disabled type="text" ng-model="newEncomienda.valor_neto" ng-change="calcularTotal()"/></td>
                                                </tr>
                                                <tr ng-show="newEncomienda.tipodoc === 'factura'">
                                                    <td colspan="4" style='text-align: right;'>IGV</td>
                                                    <td><input class="form-control" disabled type="text" ng-model="newEncomienda.igv"/></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style='text-align: right;'>Valor Total</td>
                                                    <td><input class="form-control" readonly type="text" ng-model="newEncomienda.valor_total"/></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>            
                        </div>
                    </div>
                </div>
                <button id="btnRegistrarEncomienda" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Registrar</button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="listpendientes">
            Filtros:
            <select id="sltSearchOrigen" ng-model="search_origen" class="form-control" style="display: inline; width: 15%;" 
                ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias">
                <option value="">Buscar por Origen</option>
            </select>
            <select id="sltSearchDestino" ng-model="search_destino" class="form-control" style="display: inline; width: 15%;"
                ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias">
                <option value="">Buscar por Destino</option>
            </select>
            <input type="search" placeholder="Buscar por DNI" ng-model="search_dni" class="form-control" 
                style="display: inline; width: 15%;">
            <button id="btnAsignar" type="button" class="btn btn-primary pull-right" ng-click="asignar()"><span class="glyphicon glyphicon-paperclip"></span> Asignar</button>
            <div id="marco_include">
                <div style="height: 70%; overflow:auto" class="justificado_not" id="busqueda">
                    <div id="busqueda">
                        <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                            <thead>
                                <tr class="e34X" id="panel_status">
                                    <th colspan="2" width="2%" align="center" style="text-align: center;">
                                        Código <input type="checkbox" class="form-control" ng-model="check_all_list" ng-click="check_all_list_event()" />
                                    </th>                                   
                                    <th width="3%" align="center" style="text-align: center;">
                                        Nro. Documento
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Origen
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Destino
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Remitente
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Destinatario
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Fecha de Registro
                                    </th>
                                    <th width="4%" align="center" style="text-align: center;">
                                        Valor
                                    </th>
                                    <td width='2%' align='cemter' style="text-align: center;">
                                        Condiciòn
                                    </td>
                                    <th width="4%" align="center" style="text-align: center;">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-show="loading">
                                    <td colspan="8">Cargando</td>
                                </tr>
                                <tr ng-show="encomiendas.length == 0 && !loading">
                                    <td colspan="8">No hay registros de Encomiendas</td>
                                </tr>
                                <tr ng-show="!loading" ng-repeat="encomienda in (filteredEncomiendas = (encomiendas | orderBy:'codigo' | filter: filter_encomiendas))"
                                    class="textnot2 animated" style="background-color: #fff;" 
                                    onmouseover="style.backgroundColor='#cccccc';" 
                                    onmouseout="style.backgroundColor='#fff'">

                                    <td width="1%" bgcolor="#D6E4F2">{{ encomienda.id }}</td>
                                    <td width="1%" bgcolor="#D6E4F2"><input type="checkbox" class="form-control encomiendas_selected" checklist-model="encomiendas_selected" checklist-value="encomienda.id"/></td>
                                    <td width="3%">{{ encomienda.documento }}</td>
                                    <td width="5%">{{ encomienda.desplazamiento.AgenciaOrigen.direccion }} ({{ encomienda.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ encomienda.desplazamiento.AgenciaDestino.direccion }} ({{ encomienda.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ encomienda.personaRemitente.full_name }}<br/><span style="font-weight: bold;">{{ encomienda.personaRemitente.dni }}</span></td>
                                    <td width="5%">{{ encomienda.personaDestinatario.full_name }}<br/><span style="font-weight: bold;">{{ encomienda.personaDestinatario.dni }}</span></td>
                                    <td width="5%">{{ encomienda.fechahora | date : 'yyyy-MM-dd' }}</td>
                                    <td width="4%">{{ encomienda.valor_total | number: 2 }}</td>
                                    <td width='1%'>{{ encomienda.condicion }}</td>
                                    <td width="4%">
                                        <a style="cursor: pointer;" ng-click="printBoleta(encomienda.id)" title="imprimir"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="list">
            Filtros:
            <select id="sltSearchOrigen" ng-model="search_origen" class="form-control" style="display: inline; width: 15%;" 
                ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias">
                <option value="">Buscar por Origen</option>
            </select>
            <select id="sltSearchDestino" ng-model="search_destino" class="form-control" style="display: inline; width: 15%;"
                ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias">
                <option value="">Buscar por Destino</option>
            </select>
            <input type="search" placeholder="Buscar por DNI" ng-model="search_dni" class="form-control" 
                style="display: inline; width: 15%;">
            <input type="search" placeholder="Buscar por Placa" ng-model="search_placa" class="form-control" 
                style="display: inline; width: 15%;">
            <button id="btnCancelar" type="button" class="btn btn-primary pull-right" ng-click="cancelarMany()"><span class="glyphicon glyphicon glyphicon-remove"></span> Cancelar</button>
            <button id="btnRegistrarEntrega" type="button" class="btn btn-primary pull-right" ng-click="registrarEntregaMany()"><span class="glyphicon glyphicon glyphicon-edit"></span> Entregar</button>
            <button id="btnReasignar" type="button" class="btn btn-primary pull-right" ng-click="reasignar()"><span class="glyphicon glyphicon glyphicon-refresh"></span> Reasignar</button>
            <div id="marco_include">
                <div style="height: 70%; overflow:auto" class="justificado_not" id="busqueda">
                    <div id="busqueda">
                        <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                            <thead>
                                <tr class="e34X" id="panel_status">
                                    <th width="2%" align="center" colspan="2" style="text-align: center;">
                                        Código <input type="checkbox" class="form-control" ng-model="check_all_asignados_list" ng-click="check_all_asignados_list_event()" />
                                    </th>
                                    <th width="3%" align="center" style="text-align: center;">
                                        Nro. Documento
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Origen
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Destino
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Remitente
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Destinatario
                                    </th>
                                    <th width="5%" align="center" style="text-align: center;">
                                        Fecha de Registro
                                    </th>
                                    <th width="2%" align="center" style="text-align: center;">
                                        Valor
                                    </th>
                                    <th width="3%" align="center" style="text-align: center;">
                                        Placa Bus
                                    </th>
                                    <th width="1%" align="center" style="text-align: center;">
                                        Condiciòn
                                    </th>
                                    <th width="1%" align="center" style="text-align: center;">
                                        Estado
                                    </th>
                                    <th width="4%" align="center" style="text-align: center;">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-show="loading_list">
                                    <td colspan="7">Cargando</td>
                                </tr>
                                <tr ng-show="encomiendas_list.length == 0 && !loading_list">
                                    <td colspan="7">No hay registros de Encomiendas</td>
                                </tr>
                                <tr ng-show="!loading_list" ng-repeat="encomienda in (filteredEncomiendasList = (encomiendas_list | orderBy:'codigo' | filter: filter_encomiendas))"
                                    class="textnot2 animated" style="background-color: #fff;" 
                                    onmouseover="style.backgroundColor='#cccccc';" 
                                    onmouseout="style.backgroundColor='#fff'">
                                    
                                    <td width="1%" bgcolor="#D6E4F2">{{ encomienda.id }}</td>
                                    <td width="1%" bgcolor="#D6E4F2"><input type="checkbox" class="form-control encomiendas_asignados_selected" checklist-model="encomiendas_asignados_selected" checklist-value="encomienda.id"/></td>
                                    <td width="3%">{{ encomienda.documento }}</td>
                                    <td width="5%">{{ encomienda.desplazamiento.AgenciaOrigen.direccion }} ({{ encomienda.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ encomienda.desplazamiento.AgenciaDestino.direccion }} ({{ encomienda.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ encomienda.personaRemitente.full_name }}<br/><span style="font-weight: bold;">{{ encomienda.personaRemitente.dni }}</span></td>
                                    <td width="5%">{{ encomienda.personaDestinatario.full_name }}<br/><span style="font-weight: bold;">{{ encomienda.personaDestinatario.dni }}</span></td>
                                    <td width="5%">{{ encomienda.fechahora | date: 'yyyy-MM-dd' }}</td>
                                    <td width="2%">{{ encomienda.valor_total | number: 2 }}</td>
                                    <td width="3%">{{ encomienda.programacion.bus.placa }}</td>
                                    <td width='1%' ng-class="encomienda.condicion" >{{ encomienda.condicion }}</td>
                                    <td width='1%' ng-class="encomienda.estado.descripcion" >{{ encomienda.estado.descripcion }}</td>
                                    <td width="4%">
                                        <a style="cursor: pointer;" ng-click="printBoleta(encomienda.id)" title="imprimir"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
                                        <span ng-if='encomienda.estado_id == 3'> | <a style="cursor: pointer;" ng-click="registrarEntrega(encomienda.id)" title="entregar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></span>
                                        <span ng-if='encomienda.estado_id == 3'> | <a style="cursor: pointer;" ng-click="cancelarAsignacion(encomienda.id)" title="eliminar asignaciòn"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></span>
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
                            {{ newTipoProducto | json }}
                            <div class="form-group">
                                <label for="sltProducto">Producto</label>
                                <select id="sltProducto" class="form-control"
                                    ng-options="tipo_producto as tipo_producto.descripcion for tipo_producto in tipo_productos"
                                    ng-model="newTipoProducto.producto" ng-change="cambiarTipoProducto()">
                                    <option value="">Selecciona un Producto</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtDetalle">Detalle</label>
                                <input id="txtDetalle" type="text" class="form-control" ng-model="newTipoProducto.detalle">
                            </div>
                            <div class="form-group">
                                <label for="txtValor">Valor Unitario</label>
                                <input id="txtValor" type="number" class="form-control" ng-model="newTipoProducto.valor" ng-value="newTipoProducto.producto.valor">
                            </div>
                            <div class="form-group">
                                <label for="nmbCantidad">Cantidad</label>
                                <input id="nmbCantidad" type="number" class="form-control" ng-model="newTipoProducto.cantidad" min="1">
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
                    <div class="col-sm-10 col-sm-offset-1">
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
                                    <tr class="trProducto" ng-show="!loading_programaciones" ng-repeat="programacion in programaciones_filtradas">
                                        <td>{{ programacion.id }}</td>
                                        <td>{{ programacion.bus.placa }}</td>
                                        <td>{{ programacion.ruta.descripcion }}</td>
                                        <td>{{ programacion.fechahora_prog | date: 'yyyy-MM-dd' }}</td>
                                        <td><button class="btn btn-primary btn-asignar" ng-click="registrarAsignacion(programacion.id)"><span class="glyphicon glyphicon-ok"></span></button></td>
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

<!-- Modal -->
<div class="modal fade" id="mdlClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>

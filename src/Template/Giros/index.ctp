<!-- src/Template/Giros/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Ventas");
$this->assign("title", "Giros");
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
        <li role="presentation" class="active"><a data-target="#new" aria-controls="new" role="tab" data-toggle="tab">Nuevo Giro</a></li>
        <li role="presentation"><a data-target="#listpendientes" aria-controls="listpendientes" role="tab" data-toggle="tab">Giros sin asignar</a></li>
        <li role="presentation"><a data-target="#list" aria-controls="list" role="tab" data-toggle="tab">Lista de Giros</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="new">
            <form ng-submit="saveGiro()">
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
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="txtFecha">Fecha de Registro</label>
                                            <input id="txtFecha" class="form-control" type="text" ng-model="newGiro.preFecha"/>
                                        </div>
                                    </div>                                   
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="txtFecha">Nro. Doc</label>
                                            <input id="txtFecha" class="form-control" type="text" ng-model="newGiro.nro_doc"/>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Condiciòn de Pago</legend>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><input type="radio" ng-model="newGiro.condicion" value="cancelado" /> Cancelado</label>
                                            <label><input type="radio" ng-model="newGiro.condicion" value="debe" /> Debe</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <fieldset>
                            <legend>Detalles de envío</legend>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sltOrigen">Valor a emviar</label>
                                    <input type="number" min="0" step="0.05" class="form-control" ng-model="newGiro.detalle" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sltDestino">Valor comisión</label>
                                    <input type="number" min="0" step="0.05" class="form-control" ng-model="newGiro.valor_total" required />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <button id="btnRegistrarGiro" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Registrar</button>
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
                                    <th colspan="2" width="2%" align="center">
                                        Código <input type="checkbox" class="form-control" ng-model="check_all_list" ng-click="check_all_list_event(this)" />
                                    </th>                                   
                                    <th width="3%" align="center">
                                        Nro. Documento
                                    </th>
                                    <th width="5%" align="center">
                                        Origen
                                    </th>
                                    <th width="5%" align="center">
                                        Destino
                                    </th>
                                    <th width="5%" align="center">
                                        Remitente
                                    </th>
                                    <th width="5%" align="center">
                                        Destinatario
                                    </th>
                                    <th width="5%" align="center">
                                        Fecha de Registro
                                    </th>
                                    <th width="4%" align="center">
                                        Valor
                                    </th>
                                    <td width='2%' align='cemter'>
                                        Condición
                                    </td>
                                    <th width="4%" align="center">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-show="loading">
                                    <td colspan="8">Cargando</td>
                                </tr>
                                <tr ng-show="giros.length == 0 && !loading">
                                    <td colspan="8">No hay registros de Giros</td>
                                </tr>
                                <tr ng-show="!loading" ng-repeat="giro in giros | orderBy:'codigo' | filter: filter_giros"
                                    class="textnot2 animated" style="background-color: #fff;" 
                                    onmouseover="style.backgroundColor='#cccccc';" 
                                    onmouseout="style.backgroundColor='#fff'">

                                    <td width="1%" bgcolor="#D6E4F2">{{ giro.id }}</td>
                                    <td width="1%" bgcolor="#D6E4F2"><input type="checkbox" class="form-control giros_selected" checklist-model="giros_selected" checklist-value="giro.id"/></td>
                                    <td width="3%">{{ giro.documento }}</td>
                                    <td width="5%">{{ giro.desplazamiento.AgenciaOrigen.direccion }} ({{ giro.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ giro.desplazamiento.AgenciaDestino.direccion }} ({{ giro.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ giro.personaRemitente.full_name }}<br/><span style="font-weight: bold;">{{ giro.personaRemitente.dni }}</span></td>
                                    <td width="5%">{{ giro.personaDestinatario.full_name }}<br/><span style="font-weight: bold;">{{ giro.personaDestinatario.dni }}</span></td>
                                    <td width="5%">{{ giro.fecha | date : 'yyyy-MM-dd' }}</td>
                                    <td width="4%">{{ giro.valor_total | number: 2 }}</td>
                                    <td width='1%'>{{ giro.condicion }}</td>
                                    <td width="4%">
                                        <a style="cursor: pointer;" ng-click="printBoleta(giro.id)" title="imprimir"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
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
            <input type="search" placeholder="Buscar por Asignaciòn" ng-model="search_asignado" class="form-control" 
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
                                    <th width="2%" align="center" colspan="2">
                                        Código
                                    </th>                                   
                                    <th width="3%" align="center">
                                        Nro. Documento
                                    </th>
                                    <th width="5%" align="center">
                                        Origen
                                    </th>
                                    <th width="5%" align="center">
                                        Destino
                                    </th>
                                    <th width="5%" align="center">
                                        Remitente
                                    </th>
                                    <th width="5%" align="center">
                                        Destinatario
                                    </th>
                                    <th width="5%" align="center">
                                        Fecha de Registro
                                    </th>
                                    <th width="2%" align="center">
                                        Valor
                                    </th>
                                    <th width="2%" align="center">
                                        Asignado
                                    </th>
                                    <th width="1%" align="center">
                                        Condición
                                    </th>
                                    <th width="1%" align="center">
                                        Estado
                                    </th>
                                    <th width="4%" align="center">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-show="loading_list">
                                    <td colspan="7">Cargando</td>
                                </tr>
                                <tr ng-show="giros_list.length == 0 && !loading_list">
                                    <td colspan="7">No hay registros de Giros</td>
                                </tr>
                                <tr ng-show="!loading_list" ng-repeat="giro in giros_list | orderBy:'codigo' | filter: filter_giros"
                                    class="textnot2 animated" style="background-color: #fff;" 
                                    onmouseover="style.backgroundColor='#cccccc';" 
                                    onmouseout="style.backgroundColor='#fff'">

                                    <td width="1%" bgcolor="#D6E4F2">{{ giro.id }}</td>
                                    <td width="1%" bgcolor="#D6E4F2"><input type="checkbox" class="form-control" checklist-model="giros_asignados_selected" checklist-value="giro.id"/></td>
                                    <td width="3%">{{ giro.documento }}</td>
                                    <td width="5%">{{ giro.desplazamiento.AgenciaOrigen.direccion }} ({{ giro.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ giro.desplazamiento.AgenciaDestino.direccion }} ({{ giro.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                                    <td width="5%">{{ giro.personaRemitente.full_name }}<br/><span style="font-weight: bold;">{{ giro.personaRemitente.dni }}</span></td>
                                    <td width="5%">{{ giro.personaDestinatario.full_name }}<br/><span style="font-weight: bold;">{{ giro.personaDestinatario.dni }}</span></td>
                                    <td width="5%">{{ giro.fecha | date : 'yyyy-MM-dd' }}</td>
                                    <td width="2%">{{ giro.valor_total | number: 2 }}</td>
                                    <td width="2%">{{ giro.asignado }}</td>
                                    <td width='1%' ng-class="giro.condicion" >{{ giro.condicion }}</td>
                                    <td width='1%' ng-class="giro.estado.descripcion" >{{ giro.estado.descripcion }}</td>
                                    <td width="4%">
                                        <a style="cursor: pointer;" ng-click="printBoleta(giro.id)" title="imprimir"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
                                        <span ng-if='giro.estado_id == 3'> | <a style="cursor: pointer;" ng-click="registrarEntrega(giro.id)" title="entregar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></span>
                                        <span ng-if='giro.estado_id == 3'> | <a style="cursor: pointer;" ng-click="cancelarAsignacion(giro.id)" title="eliminar asignaciòn"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></span>
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
                                    ng-model="newTipoProducto.producto" ng-change="console.log('resetear')">
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
<div class="modal fade" id="mdlAsignarGiros" tabindex="-1" role="dialog" aria-labelledby="Asignar Giro">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Asignar a Programación</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label><input type="radio" ng-model="tipo_asignacion" value="telefonica" /> Vìa Telefònica</label>
                            <label><input type="radio" ng-model="tipo_asignacion" value="programacion" /> Envìo en Bus</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div ng-show="tipo_asignacion == 'telefonica'" class="col-sm-10 col-sm-offset-1 dv-telefonica">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="txtEntrega">Responsable </label>
                                <input id="txtEntrega" class="form-control" type="text" ng-model="entrega" />
                                <button class="btn btn-primary btn-asignar" ng-click="registrarAsignacion(null)"><span class="glyphicon glyphicon-ok"></span> Asignar</button>
                            </div>
                        </div>
                    </div>
                    <div ng-show="tipo_asignacion == 'programacion'" class="col-sm-10 col-sm-offset-1 dv-programacion">
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

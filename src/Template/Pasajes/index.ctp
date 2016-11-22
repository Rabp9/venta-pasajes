<!-- src/Template/Pasajes/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Ventas");
$this->assign("title", "Pasajes");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>

<div class="row">
    <div class="col-md-9">
        <div id="dvFiltros" class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="dtFecha">Fecha</label>
                    <input id="txtFecha" class="form-control" type="text" ng-model="fecha"
                        ng-keyup="onSearchChange()"/> 
                </div>
                <div class="form-group">
                    <label for="sltOrigen">Origen</label>
                    <select id="sltOrigen" class="form-control"
                        ng-options="agencia.id as agencia.ubigeo.descripcion + ' (' + agencia.direccion + ')' for agencia in agencias"
                        ng-model="origen_selected" ng-change="onSearchChange()">
                        <option value="">Selecciona una Agencia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sltDestino">Destino</label>
                    <select id="sltDestino" class="form-control"
                        ng-options="agencia.id as agencia.ubigeo.descripcion + ' (' + agencia.direccion + ')' for agencia in agencias"
                        ng-model="destino_selected" ng-change="onSearchChange()">
                        <option value="">Selecciona una Agencia</option>
                    </select>
                </div>
            </div>
            <div id="dvresultados" class="col-sm-9">
                <div id="marco_include">
                    <div style="height: 40%; overflow: auto" class="justificado_not" id="busqueda">
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
                                            <input type="radio" name="programacion_selected" ng-click="onProgramacionSelect(programacion.id)" />
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
        </div>
        <div id="dvImagen" class="row">
            <div class="col-md-10 col-sm-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" ng-repeat="bus_piso in programacion_selected.bus.bus_pisos" ng-class='{active:$first}'>
                        <a data-target="#piso{{bus_piso.nro_piso}}" aria-controls="piso{{bus_piso.nro_piso}}" role="tab" data-toggle="tab">Piso {{bus_piso.nro_piso}}</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div ng-repeat="bus_piso in programacion_selected.bus.bus_pisos" role="tabpanel" 
                        class="tab-pane panel{{bus_piso.nro_piso}}" ng-class='{active:$first, in: $first}' id="piso{{bus_piso.nro_piso}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="droppable-container">
                                    <img id="img-bus{{bus_piso.nro_piso}}" class="img-bus" 
                                         ng-src="img/buses/{{bus_piso.imagen}}"/>
                                    <div id="asiento{{bus_piso.nro_piso}}{{bus_asiento.nro_asiento}}" 
                                        class="draggable {{bus_asiento.estado}}" ng-class="" ng-repeat="bus_asiento in bus_piso.bus_asientos"
                                        style="position: absolute; left: {{bus_asiento.x}}; top: {{bus_asiento.y}}"
                                        ng-click="showBusAsiento(bus_asiento.id, bus_asiento.estado)"
                                        ng-right-click="contextMenu(bus_asiento.id, bus_asiento.estado, $event)"
                                        title="{{showData(bus_asiento.pasaje)}}">
                                        <span>{{bus_asiento.nro_asiento}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 pnl-pasajes">
        <h4>Pasajes</h4>
        <hr/>
        <div class="panel panel-primary animated" ng-repeat="pasaje in pasajes">
            <div class="panel-heading">
                Asiento N° {{ pasaje.busAsiento.nro_asiento }}
                <button type="button" class="close close-white" ng-click="cerrarPasaje($index)">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="panel-body">
                <form id="frmPasaje{{$index}}" ng-submit="buy(pasaje, $index)">
                    <fieldset style="background-color: white;">
                        <legend>Cliente <input id="chCliente" class="pull-right" type="checkbox" ng-model="pasaje.cliente_opcion" /></legend>
                        <div ng-show="pasaje.cliente_opcion">
                            <div class="form-group">
                                <label for="txtRuc{{$index}}">RUC</label>
                                <input id="txtRuc{{$index}}" class="form-control" type="text" ng-model="pasaje.ruc" ng-keyup="searchCliente($index)" maxlength="11" />
                            </div>
                            <div class="form-group">
                                <label for="txtRazonSocial{{$index}}">Razón Social</label>
                                <input id="txtRazonSocial{{$index}}" class="form-control" type="text" readonly ng-model="pasaje.cliente.razonsocial" />
                            </div>
                            <div class="form-group">
                                <button id="btnAddCliente{{$index}}" type="button" class="btn btn-primary btn-add-cliente" ng-click="addPreCliente($index)"><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</button>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="pasaje{{$index}}">Código Boleto:</label>
                        <input id="pasaje{{$index}}" type="text" class="form-control" ng-model="pasaje.nro_doc" required/>
                    </div>
                    <div class="form-group">
                        <label for="txtPersonaDni" style="display: block;">Persona (DNI)</label>
                        <input id="txtPersonaDni" type="text" ng-model="dnis[$index]" 
                            class="form-control" maxlength="8"
                            style="width: 68%; display: inline;" />
                        <button type="button" style="width: 14%; display: inline;" class="btn btn-primary" ng-click="searchPersona($index)" title="Buscar"><span class="glyphicon glyphicon-search"></span></button>
                        <button id="btnAddPersona" type="button" style="width: 14%; display: inline;" class="btn btn-primary" ng-click="addPersona()" title="Agregar"><span class="glyphicon glyphicon-plus"></span></button>
                        <input type="text" ng-model="pasaje.persona.full_name" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="txtValor">Valor <small>({{ precio_min }} - {{ precio_max }})</small></label>
                        <input id="txtValor" type="number" min="{{ precio_min }}" 
                            max="{{ precio_max }}" ng-model="pasaje.valor" class="form-control" required />
                    </div>
                    <button id="btnComprar{{$index}}" class="btn btn-primary" type="submit">Comprar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalClientesUrl" onload="openClientesModal()">
        
    </div>
</div>

<div id="cmnPasajes" class="dropdown open">
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a ng-click="print()">Imprimir</a></li>
        <li role="separator" class="divider"></li>
        <li><a ng-click="cancel()">Cancelar</a></li>
    </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlPersonas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrlPersona" onload="openPersonasModal()">
        
    </div>
</div>
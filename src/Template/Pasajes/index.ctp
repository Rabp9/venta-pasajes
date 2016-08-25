<!-- src/Template/Pasajes/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Ventas");
$this->assign("title", "Pasajes");
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
    <div class="col-md-9">
        <div id="dvFiltros" class="row">
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
        <div id="dvresultados" class="row">
            <div class="col-sm-12">
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
                                         ng-src="img/{{bus_piso.imagen}}"/>
                                    <div id="asiento{{bus_piso.nro_piso}}{{bus_asiento.nro_asiento}}" 
                                        class="draggable {{bus_asiento.estado}}" ng-class="" ng-repeat="bus_asiento in bus_piso.bus_asientos"
                                        style="position: absolute; left: {{bus_asiento.x}}; top: {{bus_asiento.y}}"
                                        ng-click="showBusAsiento(bus_asiento.id, bus_asiento.estado)">
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
        <div class="panel panel-primary" ng-repeat="pasaje in pasajes">
            <div class="panel-heading">
                Pasaje
                <button type="button" class="close close-white" ng-click="pasajes.splice($index, 1)">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="panel-body">
                <form id="frmPasaje{{$index}}" ng-submit="buy(pasaje, $index)">
                    <div class="form-group">
                        <label for="txtProgramacionId">Código de Programación</label>
                        <input id="txtProgramacionId" type="text" ng-value="pasaje.programacion.id" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="txtNumAsiento">Nùmero de Asiento</label>
                        <input id="txtNumAsiento" type="text" ng-value="pasaje.busAsiento.nro_asiento" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="txtPersonaDni">Persona</label>
                        <input id="txtPersonaDni" type="text" ng-model="dnis[$index]" ng-keyup="onKupDni($index)" class="form-control" />
                        <input type="text" ng-model="pasaje.persona.full_name" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="txtValor">Valor</label>
                        <input id="txtValor" type="text" ng-model="pasaje.valor" class="form-control" />
                    </div>
                    <button class="btn btn-primary" type="submit">Comprar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlPasaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Bus</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('placa', ["ng-model" => "newBus.placa"]);
                            echo $this->Form->input('chasis', ["ng-model" => "newBus.chasis"]);
                            echo $this->Form->input('anio', ['label' => "Año", "ng-model" => "newBus.anio"]);
                            echo $this->Form->input('motor', ["ng-model" => "newBus.motor"]);
                            echo $this->Form->input("estado_id", [
                                "label" => "Estado",
                                "empty" => "Selecciona uno",
                                "ng-model" => "newBus.estado_id"
                            ]);

                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btnRegistrar" type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </div>
</div>
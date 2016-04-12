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
    <div class="col-md-10">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="dtFecha">Fecha</label>
                    <input id="dtFecha" class="form-control" type="date" ng-model="fecha"
                        ng-change="onSearchChange()"/> 
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
                            <tr ng-show="!searching">
                                <td colspan="6">Especifique los criterios de bùsqueda</td>
                            </tr>
                            <tr ng-show="loading">
                                <td colspan="6">Cargando...</td>
                            </tr>
                            <tr ng-show="programaciones.length == 0 && !loading">
                                <td colspan="6">No hay registros de Programaciones</td>
                            </tr>
                            <tr ng-show="!loading" ng-repeat="programacion in programaciones | orderBy:predicate:reverse"
                                class="textnot2 animated" style="background-color: #fff;" 
                                onmouseover="style.backgroundColor='#cccccc';" 
                                onmouseout="style.backgroundColor='#fff'">

                                <td width="1%" bgcolor="#D6E4F2">
                                    <input type="radio" name="programacion" ng-change="onProgramacionSelect(programacion.id)" />
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
        <div class="col-md-10 col-sm-12">
            <div class="droppable-container">
                <img id="img-bus" class="img-bus" ng-src="img/cache/bb2.jpg" />
                <div class="draggable">
                    <span>1</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <p>dasdadada</p>
        <p>dasdadada</p>
        <p>dasdadada</p>
        <p>dasdadada</p>
        <p>dasdadada</p>
        <p>dasdadada</p>
        <p>dasdadada</p>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlBuses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>
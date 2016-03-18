<!-- src/Template/Tarifas/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Tarifas");
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
    <div class="col-sm-4">
        <div class="form-group">
            <label for="sltServicio">Servicio</label>
            <select id="sltServicio" class="form-control"
                ng-options="servicio.id as servicio.descripcion for servicio in servicios"
                ng-model="servicio_selected" ng-change="onSelected()">
                <option value="">Selecciona un Servicio</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="sltOrigen">Origen</label>
            <select id="sltOrigen" class="form-control"
                ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                ng-model="origen_selected" ng-change="onSelected()">
                <option value="">Selecciona una Agencia</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
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
<div id="marco_include">
    <div style="height: 70%; overflow:auto" class="justificado_not" id="busqueda">
        <div id="busqueda">
            <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                <thead>
                    <tr class="e34X" id="panel_status">
                        <th width="3%" align="center">
                            <a ng-click="order('id')" style="cursor: pointer;">
                                Código
                                <span class="glyphicon" ng-show="predicate === 'id'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="8%" align="center">
                            <a ng-click="order('origen')" style="cursor: pointer;">
                                Origen
                                <span class="glyphicon" ng-show="predicate === 'origen'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="8%" align="center">
                            <a ng-click="order('destino')" style="cursor: pointer;">
                                Destino
                                <span class="glyphicon" ng-show="predicate === 'destino'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="8%" align="center">
                            <a ng-click="order('servicio_id')" style="cursor: pointer;">
                                Servicio
                                <span class="glyphicon" ng-show="predicate === 'servicio_id'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('asientos')" style="cursor: pointer;">
                                Tarifario
                                <span class="glyphicon" ng-show="predicate === 'asientos'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('anio')" style="cursor: pointer;">
                                Tiempo
                                <span class="glyphicon" ng-show="predicate === 'anio'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="4%" align="center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-show="loading" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        <td colspan="7">Cargando</td>
                    </tr>
                    <tr ng-show="tarifas.length == 0 && !loading && !restringido" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        <td colspan="7">
                            No hay registros de Tarifas 
                            <button ng-show="origen_selected != 0 && destino_selected != 0" type="button" class="btn btn-primary" ng-click="registerTarifa()">Registrar Tarifa</button>
                        </td>
                    </tr>
                    <tr ng-show="restringido" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        <td colspan="7">{{ warning }}</td>
                    </tr>
                    <tr ng-show="!loading" ng-repeat="tarifa in tarifas | orderBy:predicate:reverse"
                        class="textnot2 animated" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        
                        <td width="3%" bgcolor="#D6E4F2">{{ tarifa.id }}</td>
                        <td width="8%">{{ tarifa.AgenciaOrigen.direccion + ' (' + tarifa.AgenciaOrigen.ubigeo.descripcion + ')' }}</td>
                        <td width="8%">{{ tarifa.AgenciaDestino.direccion + ' (' + tarifa.AgenciaDestino.ubigeo.descripcion + ')' }}</td>
                        <td width="8%">{{ tarifa.servicio.descripcion }}</td>
                        <td width="5%">{{ tarifa.precio_min + ' - ' + tarifa.precio_max }}</td>
                        <td width="5%">{{ tarifa.tiempo }}</td>
                        <td width="4%">
                            <a style="cursor: pointer;" ng-click="updateTarifa(tarifa.id)" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>  
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlTarifas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>
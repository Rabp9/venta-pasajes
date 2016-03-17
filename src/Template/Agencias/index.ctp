<!-- src/Template/Agencias/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Agencias");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<a class="btn btn-primary" ng-click="addAgencia()"><span class="glyphicon glyphicon-plus"></span> Nueva Agencia</a>

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
                        <th width="6%" align="center">
                            <a ng-click="order('ubigeo_id')" style="cursor: pointer;">
                                Ubigeo
                                <span class="glyphicon" ng-show="predicate === 'ubigeo_id'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="8%" align="center">
                            <a ng-click="order('direccion')" style="cursor: pointer;">
                                Dirección
                                <span class="glyphicon" ng-show="predicate === 'direccion'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('telefono')" style="cursor: pointer;">
                                Teléfono
                                <span class="glyphicon" ng-show="predicate === 'telefono'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('celular')" style="cursor: pointer;">
                                Celular
                                <span class="glyphicon" ng-show="predicate === 'celular'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('estado_id')" style="cursor: pointer;">
                                Estado
                                <span class="glyphicon" ng-show="predicate === 'estado_id'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="4%" align="center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-show="loading">
                        <td colspan="7">Cargando</td>
                    </tr>
                    <tr ng-show="agencias.length == 0 && !loading">
                        <td colspan="7">No hay registros de Agencias</td>
                    </tr>
                    <tr ng-show="!loading" ng-repeat="agencia in agencias | orderBy:predicate:reverse"
                        class="textnot2 animated" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        
                        <td width="3%" bgcolor="#D6E4F2">{{ agencia.id }}</td>
                        <td width="6%">{{ agencia.ubigeo.descripcion + " (" + agencia.ubigeo.parent_ubigeo.descripcion + ")" }}</td>
                        <td width="8%">{{ agencia.direccion }}</td>
                        <td width="5%">{{ agencia.telefono }}</td>
                        <td width="5%">{{ agencia.celular }}</td>
                        <td width="5%">{{ agencia.estado.descripcion }}</td>
                       
                        <td width="4%">
                            <a style="cursor: pointer;" ng-click="viewAgencia(agencia.id)" title="ver"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="editAgencia(agencia.id)" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="removeAgencia(agencia.id)" title="desactivar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlAgencias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>

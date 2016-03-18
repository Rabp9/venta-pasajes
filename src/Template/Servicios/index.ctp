<!-- src/Template/Servicios/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Servicios");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<a class="btn btn-primary" ng-click="addServicio()"><span class="glyphicon glyphicon-plus"></span> Nuevo Servicio</a>

<div id="marco_include">
    <div style="height: 70%; overflow:auto" class="justificado_not" id="busqueda">
        <div id="busqueda">
            <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                <thead>
                    <tr class="e34X" id="panel_status">
                        <th width="15%" align="center">
                            <a ng-click="order('id')" style="cursor: pointer;">
                                Código
                                <span class="glyphicon" ng-show="predicate === 'id'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="35%" align="center">
                            <a ng-click="order('descripcion')" style="cursor: pointer;">
                                Descripción
                                <span class="glyphicon" ng-show="predicate === 'descripcion'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="35%" align="center">
                            <a ng-click="order('estado_id')" style="cursor: pointer;">
                                Estado
                                <span class="glyphicon" ng-show="predicate === 'estado_id'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="10%" align="center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-show="loading">
                        <td colspan="7">Cargando</td>
                    </tr>
                    <tr ng-show="servicios.length == 0 && !loading">
                        <td colspan="7">No hay registros de Servicios</td>
                    </tr>
                    <tr ng-show="!loading" ng-repeat="servicio in servicios | orderBy:predicate:reverse"
                        class="textnot2 animated" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        
                        <td width="15%" bgcolor="#D6E4F2">{{ servicio.id }}</td>
                        <td width="35%">{{ servicio.descripcion }}</td>
                        <td width="35%">{{ servicio.estado.descripcion }}</td>
                        <td width="10%">
                            <a style="cursor: pointer;" ng-click="viewServicio(servicio.id)" title="ver"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="editServicio(servicio.id)" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="removeServicio(servicio.id)" title="desactivar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>  
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlServicios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>
<!-- src/Template/Clientes/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Clientes");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<a id="btnAddCliente" class="btn btn-primary" ng-click="addCliente()"><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</a>

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
                            <a ng-click="order('ruc')" style="cursor: pointer;">
                                RUC
                                <span class="glyphicon" ng-show="predicate === 'ruc'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="8%" align="center">
                            <a ng-click="order('razonsocial')" style="cursor: pointer;">
                                Razón Social
                                <span class="glyphicon" ng-show="predicate === 'razonsocial'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
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
                    <tr ng-show="clientes.length == 0 && !loading">
                        <td colspan="7">No hay registros de Clientes</td>
                    </tr>
                    <tr ng-show="!loading" ng-repeat="cliente in clientes | orderBy:predicate:reverse"
                        class="textnot2 animated" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        
                        <td width="3%" bgcolor="#D6E4F2">{{ cliente.id }}</td>
                        <td width="6%">{{ cliente.ruc }}</td>
                        <td width="8%">{{ cliente.razonsocial }}</td>
                        <td width="5%">{{ cliente.direccion }}</td>
                        <td width="5%">{{ cliente.telefono }}</td>
                        <td width="5%">{{ cliente.estado.descripcion }}</td>
                       
                        <td width="4%">
                            <a style="cursor: pointer;" ng-click="viewCliente(cliente.id)" title="ver"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="editCliente(cliente.id)" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="removeCliente(cliente.id)" title="desactivar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>

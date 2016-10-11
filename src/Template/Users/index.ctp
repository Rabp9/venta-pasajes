<!-- src/Template/Users/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Usuarios");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<a id="btnAddUser" class="btn btn-primary" ng-click="addUser()"><span class="glyphicon glyphicon-plus"></span> Nuevo Usuario</a>

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
                            <a ng-click="order('username')" style="cursor: pointer;">
                                Nombre de Usuario
                                <span class="glyphicon" ng-show="predicate === 'username'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="8%" align="center">
                            <a ng-click="order('user_detalle.group.descripcion')" style="cursor: pointer;">
                                Grupo
                                <span class="glyphicon" ng-show="predicate === 'direccion'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('user_detalle.agencia.direccion')" style="cursor: pointer;">
                                Agencia
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
                    <tr ng-show="users.length == 0 && !loading">
                        <td colspan="7">No hay registros de Usuarios</td>
                    </tr>
                    <tr ng-show="!loading" ng-repeat="user in users | orderBy:predicate:reverse"
                        class="textnot2 animated" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        
                        <td width="3%" bgcolor="#D6E4F2">{{ user.id }}</td>
                        <td width="6%">{{ user.username }}</td>
                        <td width="8%">{{ user.user_detalle.group.descripcion }}</td>
                        <td width="5%">{{ user.user_detalle.agencia.direccion }} ({{ user.user_detalle.agencia.ubigeo.descripcion }})</td>
                        <td width="5%">{{ user.estado.descripcion }}</td>
                       
                        <td width="4%">
                            <a style="cursor: pointer;" ng-click="viewUser(user.id)" title="ver"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="editUser(user.id)" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="removeUser(user.id)" title="desactivar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrlUsers" onload="openModalUsers()">
        
    </div>
</div>

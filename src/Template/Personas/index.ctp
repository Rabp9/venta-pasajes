<!-- src/Template/Personas/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Personas");
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
    <div class= "col-sm-2"> 
        <a id="btnAddPersona" class="btn btn-primary" ng-click="addPersona()"><span class="glyphicon glyphicon-plus"></span> Nueva Persona</a>
    </div>
    
    <div class= "col-md-3">
        <form class="form-inline">
            <div class="form-group">
                <input id="txtDni" class="form-control" ng-model="dni" type="search" maxlength="8" placeholder="Buscar por DNI">
            </div>
            <button class="btn btn-primary" type="button" ng-click="buscarpersona()"><samp class="glyphicon glyphicon-search"></samp></button>
        </form>
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
                        <th width="6%" align="center">
                            <a ng-click="order('dni')" style="cursor: pointer;">
                                DNI
                                <span class="glyphicon" ng-show="predicate === 'dni'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="8%" align="center">
                            <a ng-click="order('nombres')" style="cursor: pointer;">
                                Nombres
                                <span class="glyphicon" ng-show="predicate === 'nombres'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('apellidos')" style="cursor: pointer;">
                                Apellidos
                                <span class="glyphicon" ng-show="predicate === 'apellidos'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('domicilio')" style="cursor: pointer;">
                                Domicilio
                                <span class="glyphicon" ng-show="predicate === 'domicilio'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('fecha_nac')" style="cursor: pointer;">
                                Fecha Nacimiento
                                <span class="glyphicon" ng-show="predicate === 'fecha_nac'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('sexo')" style="cursor: pointer;">
                                Sexo
                                <span class="glyphicon" ng-show="predicate === 'sexo'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('estado_id')" style="cursor: pointer;">
                                Celular
                                <span class="glyphicon" ng-show="predicate === 'estado_id'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('estado_id')" style="cursor: pointer;">
                                Correo
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
                    <tr ng-show="pesonas.length == 0 && !loading">
                        <td colspan="7">No hay registros de Personas</td>
                    </tr>
                    <tr ng-show="!loading" ng-repeat="persona in personas | orderBy:predicate:reverse"
                        class="textnot2 animated" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                        
                        <td width="3%" bgcolor="#D6E4F2">{{ persona.id }}</td>
                        <td width="6%">{{ persona.dni }}</td>
                        <td width="8%">{{ persona.nombres }}</td>
                        <td width="5%">{{ persona.apellidos }}</td>
                        <td width="5%">{{ persona.domicilio }}</td>
                        <td width="5%">{{ persona.fecha_nac | date: 'yyyy-MM-dd' : 'UTC' }}</td>
                        <td width="5%">{{ persona.sexo | sexo }}</td>
                        <td width="5%">{{ persona.cel }}</td>
                        <td width="5%">{{ persona.correo }}</td>
                        <td width="4%">
                            <a style="cursor: pointer;" ng-click="viewPersona(persona.id)" title="ver"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="editPersona(persona.id)" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="removePersona(persona.id)" title="desactivar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>  
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlPersonas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>
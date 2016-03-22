<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Conductores");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>

<div  class= "row" > 
    <div  class= "col-sm-1"> <a class="btn btn-primary" ng-click="addConductor()"><span class="glyphicon glyphicon-plus"></span> Registrar Conductor</a> </div> 
    <div  class= "col-md-1" style="text-align: right " >  <label for="txtDni">DNI</label></div> 
  <div  class= "col-md-1" style="text-align: left"> <input class="form-control" ng-model="dni" type="search" maxlength="8" > </div> 
  <div  class= "col-md-1" > 
  <button class="btn btn-primary" type="button" ng-click="buscarconductor()"><samp class="glyphicon glyphicon-search"></samp> Buscar</button>
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
                        <th width="6%" align="center">
                            <a ng-click="order('nombres')" style="cursor: pointer;">
                                Nombres
                                <span class="glyphicon" ng-show="predicate === 'nombres'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="8%" align="center">
                            <a ng-click="order('licencia')" style="cursor: pointer;">
                                Nro Licencia
                                <span class="glyphicon" ng-show="predicate === 'licencia'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
                            </a>
                        </th>
                        <th width="5%" align="center">
                            <a ng-click="order('categoria')" style="cursor: pointer;">
                                Categoria
                                <span class="glyphicon" ng-show="predicate === 'categoria'" ng-class="{'glyphicon-chevron-down':reverse, 'glyphicon-chevron-up':!reverse}"></span>
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
                    <tr ng-show="conductores.length == 0 && !loading">
                        <td colspan="7">No hay registros de Conductores</td>
                    </tr>
                    <tr ng-show="!loading" ng-repeat="conductor in conductores | orderBy:predicate:reverse"
                        class="textnot2 animated" style="background-color: #fff;" 
                        onmouseover="style.backgroundColor='#cccccc';" 
                        onmouseout="style.backgroundColor='#fff'">
                      
                        <td width="3%" bgcolor="#D6E4F2">{{ conductor.id }}</td>
                        <td width="6%">{{ conductor.persona.dni}}</td>
                        <td width="6%">{{ conductor.persona.nombres + ' '+conductor.persona.apellidos }}</td>
                        
                        <td width="8%">{{ conductor.licencia }}</td>
                        <td width="5%">{{ conductor.categoria }}</td>
                       
                        <td width="5%">{{ conductor.estado.descripcion }}</td>
                        <td width="4%">
                            <a style="cursor: pointer;" ng-click="viewConductor(conductor.id)" title="ver"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="editConductor(conductor.id)" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="removeConductor(conductor.id)" title="desactivar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>  
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlConductores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>

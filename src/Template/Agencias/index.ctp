<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Agencias");
?>
<style>
    .animated {
        opacity: 2;
        max-height: auto;
        overflow: hidden;
        transition: all 2%;
    }
    
    .animated.ng-hide {
        opacity: 0;
        max-height: 0px !important;
        display: block !important;
    }
</style>
<div id="marco_include">
    <div style="height:200px; overflow:auto" class="justificado_not" id="busqueda">
        <div id="busqueda">
            <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                <thead>
                    <tr class="e34X" id="panel_status">
                        <th width="3%" align="center"><?= $this->Paginator->sort("id", "Código") ?></th>
                        <th width="6%" align="center"><?= $this->Paginator->sort("ubigeo_id") ?></th>
                        <th width="8%" align="center"><?= $this->Paginator->sort("direccion") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("telefono") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("celular") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("estado_id") ?></th>
                        <th width="4%" align="center"><?= __("Acciones") ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-show="loading">
                        <td colspan="7">Cargando</td>
                    </tr>
                    <tr ng-show="agencias.length == 0 && !loading">
                        <td colspan="7">No hay registros de Buses</td>
                    </tr>
                    <tr ng-show="agencias.length > 0" ng-repeat="agencia in agencias" class="textnot2 animated" style="background-color: #fff;" onmouseover="style.backgroundColor='#cccccc';" onmouseout="style.backgroundColor='#fff'">
                        <td width="3%" bgcolor="#D6E4F2">{{ agencia.id }}</td>
                        <td width="6%">{{ agencia.ubigeo_id }}</td>
                        <td width="8%">{{ agencia.direccion }}</td>
                        <td width="5%">{{ agencia.telefono }}</td>
                        <td width="5%">{{ agencia.celular }}</td>
                        <td width="5%">{{ agencia.estado_id }}</td>
                       
                        <td width="4%">
                            <a style="cursor: pointer;" ng-click="viewBus(agencia.id)" title="ver" data-toggle="modal" data-target="#mdlAgencias"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="editBus(agencia.id)" title="editar" data-toggle="modal" data-target="#mdlAgencias"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="removeBus(agencia.id)" title="desactivar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a class="btn btn-primary" ng-click="addAgencia()" data-toggle="modal" data-target="#mdlAgencias"><span class="glyphicon glyphicon-plus"></span> Nuevo Agencia</a>

<!-- Modal -->
<div class="modal fade" id="mdlAgencias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl">
        
    </div>
</div>

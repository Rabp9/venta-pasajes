<!-- src/Template/Buses/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Buses");
?>
<div id="marco_include">
    <div style="height:200px; overflow:auto" class="justificado_not" id="busqueda">
        <div id="busqueda">
            <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                <thead>
                    <tr class="e34X" id="panel_status">
                        <th width="3%" align="center"><?= $this->Paginator->sort("id", "Código") ?></th>
                        <th width="6%" align="center"><?= $this->Paginator->sort("placa") ?></th>
                        <th width="8%" align="center"><?= $this->Paginator->sort("chasis") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("asientos") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("anio", "Año") ?></th>
                        <th width="4%" align="center"><?= __("Acciones") ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="bus in buses.buses" class="textnot2" style="background-color: #fff;" onmouseover="style.backgroundColor='#cccccc';" onmouseout="style.backgroundColor='#fff'">
                        <td width="3%" bgcolor="#D6E4F2">{{ bus.id }}</td>
                        <td width="6%">{{ bus.placa }}</td>
                        <td width="8%">{{ bus.chasis }}</td>
                        <td width="5%">{{ bus.asientos }}</td>
                        <td width="5%">{{ bus.anio }}</td>
                        <td width="4%">
                            <a style="cursor: pointer;" title="ver" data-toggle="modal" data-target="#mdlBuses"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" title="editar" data-toggle="modal" data-target="#mdlBuses"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a class="btn btn-primary" ng-click="addBus()" data-toggle="modal" data-target="#mdlBuses">Nuevo Bus</a>

<!-- Modal -->
<div class="modal fade" id="mdlBuses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl">
        
    </div>
</div>
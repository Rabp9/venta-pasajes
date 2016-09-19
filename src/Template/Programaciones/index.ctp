<!-- src/Template/Programaciones/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Programación");
$this->assign("title", "Lista de Programaciones");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
Filtros:
<select id="sltSearchServicio" ng-model="search_servicio" class="form-control" style="display: inline; width: 15%;" 
    ng-options="servicio.id as servicio.descripcion for servicio in servicios">
    <option value="">Buscar por Servicio</option>
</select>
<input type="search" placeholder="Buscar por Placa de Bus" ng-model="search_placa" class="form-control" style="display: inline; width: 15%;" />
<input id="txtBuscarFecha" type="text" placeholder="Buscar por fecha" ng-model="search_fecha" class="form-control" style="display: inline; width: 15%" />
<a id="aProgramacionesAdd" class="btn btn-primary pull-right" ng-click="addProgramacion()"><span class="glyphicon glyphicon-plus"></span> Nueva Programación</a>
<div class="list-group">
    <a ng-repeat="programacion in programaciones | filter: filter_programaciones" class="list-group-item">
        <h4 class="list-group-item-heading"><strong>{{programacion.ruta.descripcion}}</strong>: {{ programacion.ruta.detalle }}</h4>
        <p class="list-group-item-text">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 10%"><strong>Servicio</strong></td>
                        <td style="width: 25%"><strong>Bus</strong></td>
                        <td style="width: 25%"><strong>Fecha y Hora</strong></td>
                        <td style="width: 40%"><strong>Acciones</strong></td>
                    </tr>
                    <tr>
                        <td>{{programacion.servicio.descripcion}}</td>
                        <td>{{programacion.bus.placa}}</td>
                        <td>{{programacion.fechahora_prog }}</td>
                        <td><button ng-click="showList(programacion.id)" class="btn btn-primary" title="Lista de Encomiendas"><span class="glyphicon glyphicon-list"></span></button></td>
                    </tr>
                </table>
            </div>
        </p>
    </a>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlProgramacionesAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalProgramacionesAddUrl" onload="openProgramacionesAddModal()">
        
    </div>
</div>
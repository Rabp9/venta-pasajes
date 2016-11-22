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
<label><input type="radio" ng-model="tipo" ng-value="1" ng-change="cambiar()"> Disponibles</label> |
<label><input type="radio" ng-model="tipo" ng-value="2" ng-change="cambiar()"> Anteriores</label>

<a id="aProgramacionesAdd" class="btn btn-primary pull-right" ng-click="addProgramacion()"><span class="glyphicon glyphicon-plus"></span> Nueva Programación</a>
<div class="list-group">
    <p ng-show="loading">Cargando...</p>
    <p ng-show="!loading && programaciones.length == 0">No se encontraron programaciones.</p>
    <a ng-repeat="programacion in programaciones | filter: filter_programaciones" class="list-group-item">
        <h4 class="list-group-item-heading"><strong>{{programacion.ruta.descripcion}}</strong>: {{ programacion.ruta.detalle }}</h4>
        <p class="list-group-item-text table-responsive">
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
                    <td>
                        <button ng-hide="programacion.fecha_via != null" ng-click="registrarSalida(programacion.id)" class="btn btn-primary btn-registrar-salida" title="Registrar Salida"><span class="glyphicon glyphicon-send"></span></button>
                        <button ng-show="programacion.fecha_via != null" ng-click="showListPasajeros(programacion.id)" class="btn btn-primary" title="Lista de Pasajeros"><span class="glyphicon glyphicon-object-align-left"></span></button>
                        <button ng-click="showListEncomiendas(programacion.id)" class="btn btn-primary" title="Lista de Encomiendas"><span class="glyphicon glyphicon-list"></span></button>
                        <button ng-show="programacion.fecha_via != null" ng-click="showManifiestoPasajeros(programacion.id)" class="btn btn-primary" title="Manifiesto de Pasajeros"><span class="glyphicon glyphicon-list-alt"></span></button>
                    </td>
                </tr>
            </table>
        </p>
    </a>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlProgramacionesAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalProgramacionesAddUrl" onload="openProgramacionesAddModal()">
        
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlRegistrarSalida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalRegistrarSalidaUrl" onload="openRegistrarSalidaModal()">
        
    </div>
</div>
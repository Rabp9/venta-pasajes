<!-- src/Template/Rutas/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Programación");
$this->assign("title", "Rutas");
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
    <div class="col-sm-2">
        <p ng-show="loading_rutas">Cargando...</p>
        <p ng-show="rutas.length == 0 && !loading">No hay registros de Rutas</p>
        <ul id="ulRutas" class="nav nav-pills nav-stacked">
            <li role="presentation" ng-repeat="ruta in rutas"><a ng-click="loadDesplazamientos($event, ruta.id)">{{ ruta.descripcion }}</a></li>
        </ul>
        <button class="btn btn-primary" ng-click="addRuta()">Nueva Ruta</button>
    </div>
    <p ng-show="loading_ruta_selected">Cargando...</p>
    <div ng-hide="ruta_selected.length == 0 || loading_ruta_selected" class="col-sm-10" ng-show="ruta_selected.length != []">
        <h3>{{ ruta_selected.descripcion}} - Desplazamientos <small> Código: {{ ruta_selected.id }}</small></h3>
        <div id="marco_include">
            <div style="height:200px; overflow:auto" class="justificado_not" id="busqueda">
                <div id="busqueda">
                    <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                        <thead>
                            <tr class="e34X" id="panel_status">
                                <th width="5%" align="center">Código</th>
                                <th width="35%" align="center">Origen</th>
                                <th width="35%" align="center">Destino</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="detalle_desplazamiento in ruta_selected.detalle_desplazamientos" class="textnot2 animated" style="background-color: #fff;" onmouseover="style.backgroundColor='#cccccc';" onmouseout="style.backgroundColor='#fff'">
                                <td width="5%" bgcolor="#D6E4F2">{{ detalle_desplazamiento.id }}</td>
                                <td width="35%" align="center">{{ detalle_desplazamiento.desplazamiento.AgenciaOrigen.direccion }} ({{ detalle_desplazamiento.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                <td width="35%" align="center">{{ detalle_desplazamiento.desplazamiento.AgenciaDestino.direccion }} ({{ detalle_desplazamiento.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" ng-click="addDesplazamiento()">Nuevo Desplazamiento</button>
        <button type="button" class="btn btn-primary" ng-click="setRestricciones()">Restricciones</button>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlRutas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" ng-class="{'modal-lg':modal_grande}" role="document" ng-include="modalUrl" onload="openModal()">
 
    </div>
</div>
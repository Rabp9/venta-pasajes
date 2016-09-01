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
        <button id="btnAddRuta" style="width: 100%" class="btn btn-primary" ng-click="addRuta()"><span class="glyphicon glyphicon-plus"></span> Nueva Ruta</button>
        <p ng-show="loading_rutas">Cargando...</p>
        <p ng-show="rutas.length == 0 && !loading">No hay registros de Rutas</p>
        <div id="dvRutas" class="list-group">
            <a ng-mouseover="showOptions = true" ng-mouseleave="showOptions = false" ng-repeat="ruta in rutas" style="cursor: pointer;" class="list-group-item"  ng-click="loadDesplazamientos($event, ruta.id)">
                {{ ruta.descripcion }}
                <span class="pull-right" ng-show="showOptions">
                    <span ng-click="editRuta(ruta.id, $event)" class="glyphicon glyphicon-pencil"></span>
                    <span ng-click="removeRuta(ruta.id, $event)" class="glyphicon glyphicon-remove"></span>
                </span>
            </a>
        </div>
    </div>
    <div class="col-sm-10 panel" style="height: 82%">
        <p ng-show="loading_ruta_selected">Cargando...</p>
        <div ng-hide="ruta_selected.length == 0 || loading_ruta_selected">
            <h3>{{ ruta_selected.descripcion}} - Desplazamientos <small> Código: {{ ruta_selected.id }}</small></h3>
            <div id="marco_include">
                <div style="height:200px; overflow:auto" class="justificado_not" id="busqueda">
                    <div id="busqueda">
                        <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                            <thead>
                                <tr class="e34X" id="panel_status">
                                    <th width="5%" style="text-align: center;">Código</th>
                                    <th width="35%" style="text-align: center;">Origen</th>
                                    <th width="35%" style="text-align: center;">Destino</th>
                                    <th width='2%'>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-mouseover="showOptions = true" ng-mouseleave="showOptions = false" ng-repeat="detalle_desplazamiento in ruta_selected.detalle_desplazamientos" class="textnot2 animated" style="background-color: #fff;" onmouseover="style.backgroundColor='#cccccc';" onmouseout="style.backgroundColor='#fff'">
                                    <td width="5%" bgcolor="#D6E4F2">{{ detalle_desplazamiento.id }}</td>
                                    <td width="35%" align="center">{{ detalle_desplazamiento.desplazamiento.AgenciaOrigen.direccion }} ({{ detalle_desplazamiento.desplazamiento.AgenciaOrigen.ubigeo.descripcion }})</td>
                                    <td width="35%" align="center">{{ detalle_desplazamiento.desplazamiento.AgenciaDestino.direccion }} ({{ detalle_desplazamiento.desplazamiento.AgenciaDestino.ubigeo.descripcion }})</td>
                                    <td width='2%'>
                                        <a style="cursor: pointer;" ng-click="removeDetalleDesplazamiento(detalle_desplazamiento.id, $event)" title="Eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button id="btnAddDesplazamientos" type="button" class="btn btn-primary" ng-click="addDesplazamiento()">Nuevo Desplazamiento</button>
            <button id="btnSetRestricciones" type="button" class="btn btn-primary" ng-click="setRestricciones()">Restricciones</button>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlRutas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalRutasUrl" onload="openModalRutas()">
 
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlEditRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalEditRutaUrl" onload="openModalEditRuta()">
 
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlDesplazamientos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalDesplazamientosUrl" onload="openModalDesplazamientos()">
 
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlRestricciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" class="modal-lg" role="document" ng-include="modalRestriccionesUrl" onload="openModalRestricciones()">
 
    </div>
</div>
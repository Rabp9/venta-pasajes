<!-- src/Template/Rutas/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Programación");
$this->assign("title", "Rutas");
?>
<div class="row">
    <div class="col-sm-2">
        <ul class="nav nav-pills nav-stacked" ng-repeat="ruta in rutas">
            <li role="presentation" ng-class='{active:$first}'><a ng-click="loadDesplazamientos(ruta.id)">{{ ruta.descripcion }}</a></li>
        </ul>
        <button class="btn btn-primary" ng-click="addRuta()">Nueva Ruta</button>
    </div>
    <div class="col-sm-10">
        <h3>{{ ruta_selected.descripcion}} - Desplazamientos <small> Código: {{ ruta_selected.id }}</small></h3>
        <div id="marco_include">
            <div style="height:200px; overflow:auto" class="justificado_not" id="busqueda">
                <div id="busqueda">
                    <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                        <thead>
                            <tr class="e34X" id="panel_status">
                                <th width="5%" align="center">Código</th>
                                <th width="25%" align="center">Origen</th>
                                <th width="25%" align="center">Destino</th>
                                <th width="30%" align="center">Tarifario</th>
                                <th width="15%" align="center">Tiempo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="desplazamiento in ruta_selected.detalle_desplazamientos" class="textnot2 animated" style="background-color: #fff;" onmouseover="style.backgroundColor='#cccccc';" onmouseout="style.backgroundColor='#fff'">
                                <td width="5%" bgcolor="#D6E4F2">{{ desplazamiento.id }}</td>
                                <td width="25%" align="center">{{ desplazamiento.tarifa.AgenciaOrigen.direccion }} ({{ desplazamiento.tarifa.AgenciaOrigen.ubigeo.descripcion }})</td>
                                <td width="25%" align="center">{{ desplazamiento.tarifa.AgenciaDestino.direccion }} ({{ desplazamiento.tarifa.AgenciaDestino.ubigeo.descripcion }})</td>
                                <td width="30%" align="center">{{ desplazamiento.tarifa.precio_min }} - {{ desplazamiento.tarifa.precio_max }}</td>
                                <td width="15%" align="center">{{ desplazamiento.tarifa.tiempo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" ng-click="addDesplazamiento()">Nuevo Desplazamiento</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlRutas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
 
    </div>
</div>
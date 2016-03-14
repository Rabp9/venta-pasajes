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
                                <th width="10%" align="center">Código</th>
                                <th width="25%" align="center">Origen</th>
                                <th width="25%" align="center">Destino</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="desplazamiento in ruta_selected.detalle_desplazamientos" class="textnot2 animated" style="background-color: #fff;" onmouseover="style.backgroundColor='#cccccc';" onmouseout="style.backgroundColor='#fff'">
                                <td width="10%" bgcolor="#D6E4F2">{{ desplazamiento.id }}</td>
                                <th width="25%" align="center">{{ desplazamiento.origen.direccion }} ({{ desplazamiento.origen.ubigeo.descripcion }})</td>
                                <th width="25%" align="center">{{ desplazamiento.destino.direccion }} ({{ desplazamiento.destino.ubigeo.descripcion }})</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" ng-click="openNuevoDesplazamiento()">Nuevo Desplazamiento</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlRutas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl">
 
    </div>
</div>
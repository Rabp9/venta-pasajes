<!-- src/Template/Programaciones/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Programación");
$this->assign("title", "Nueva Programación");
?>

<form ng-submit="saveProgramacion()">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="txtFechaHora">Fecha y Hora</label>
                <input id="txtFechaHora" type="datetime-local" ng-model="prefechahora_prog" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-primary pnl-programaciones-add">
                <div class="panel-heading">SELECCIÓN DE BUS</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="sltBuses">Bus</label>
                        <select id="sltBuses" class="form-control" ng-model="programacion.bus_id" 
                            ng-options="bus.id as bus.placa for bus in buses" ng-change="onBusSelected()">
                            <option value="">Selecciona un Bus</option>
                        </select>
                    </div>
                    <div ng-show="programacion.bus_id != null">
                        <dl class="dl-horizontal">
                            <dt>Código</dt>
                            <dd>{{busSelected.id}}</dd>

                            <dt>Placa</dt>
                            <dd>{{busSelected.placa}}</dd>

                            <dt>Chasis</dt>
                            <dd>{{busSelected.chasis}}</dd>

                            <dt>Año</dt>
                            <dd>{{busSelected.anio}}</dd>

                            <dt>Pisos</dt>
                            <dd>{{busSelected.nro_pisos}}</dd>

                            <dt class="hidden-xs">Asientos</dt>
                            <dd class="hidden-xs">{{busSelected.nro_asientos}}</dd>

                            <dt class="hidden-xs">Estado</dt>
                            <dd class="hidden-xs">{{busSelected.estado.descripcion}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-primary pnl-programaciones-add">
                <div class="panel-heading">SELECCIÓN DE RUTA</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="sltRutas">Ruta</label>
                        <select id="sltRutas" class="form-control" ng-model="programacion.ruta_id" 
                            ng-options="ruta.id as ruta.descripcion for ruta in rutas" ng-change="onRutaSelected()">
                            <option value="">Selecciona una Ruta</option>
                        </select>
                    </div>
                    <div ng-show="programacion.ruta_id != null">
                        <dl class="dl-horizontal">
                            <dt>Código</dt>
                            <dd>{{rutaSelected.id}}</dd>

                            <dt>Descripción</dt>
                            <dd>{{rutaSelected.descripcion}}</dd>

                            <dt>Desplazamientos</dt>
                            <dd></dd>

                            <ul class="tag-overflow">
                                <li ng-repeat="detalle in rutaSelected.detalle_desplazamientos">
                                    {{detalle.desplazamiento.AgenciaOrigen.direccion}} 
                                    ({{detalle.desplazamiento.AgenciaOrigen.ubigeo.descripcion}}) - 
                                    {{detalle.desplazamiento.AgenciaDestino.direccion}}
                                    ({{detalle.desplazamiento.AgenciaDestino.ubigeo.descripcion}})
                                </li>
                            </ul>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-primary pnl-programaciones-add">
                <div class="panel-heading">SELECCIÓN DE SERVICIO</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="sltServicios">Servicio</label>
                        <select id="sltServicios" class="form-control" ng-model="programacion.servicio_id" 
                            ng-options="servicio.id as servicio.descripcion for servicio in servicios" ng-change="onServicioSelected()">
                            <option value="">Selecciona un Servicio</option>
                        </select>
                    </div>
                    <div ng-show="programacion.servicio_id != null">
                        <dl class="dl-horizontal">
                            <dt>Código</dt>
                            <dd>{{servicioSelected.id}}</dd>

                            <dt>Descripción</dt>
                            <dd>{{servicioSelected.descripcion}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-primary pnl-programaciones-add">
                <div class="panel-heading">SELECCIÓN DE CONDUCTORES</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="sltConductores">Conductores</label>
                        <select id="sltConductores" class="form-control" ng-model="conductores_ids" 
                            ng-options="conductor.id as conductor.persona.full_name for conductor in conductores" 
                            ng-change="onConductoresSelected()" multiple>
                            <option value="">Selecciona los Conductores</option>
                        </select>
                    </div>
                    <div ng-show="conductores_ids != null">
                        <div class="table-responsive tag-overflow">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Conductor</th>
                                        <th>Condición</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="conductor in conductoresSelected">
                                        <td>
                                            {{conductor.persona.full_name}}
                                        </td>
                                        <td>
                                            <select class="form-control" 
                                                ng-options="condicion for condicion in ['chofer', 'copiloto']"
                                                ng-model="programacion.detalle_conductores[$index].condicion">
                                                <option value="">Selecciona una condición</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="btnRegistrarProgramacion" type="submit" class="btn btn-primary">Registrar</button>
    <a href="#/programaciones" class="btn btn-primary">Regresar</a>
</form>
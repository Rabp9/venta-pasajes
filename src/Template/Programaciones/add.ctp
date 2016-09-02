<!-- src/Template/Programaciones/add.ctp -->
<div ng-controller="AddProgramacionesController">
    <form ng-submit="saveProgramacion()">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Programación</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{ step | json}}
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group" ng-show="step == 1">
                            <label for="txtFechaHora">Fecha y Hora</label>
                            <input id="txtFechaHora" type="datetime-local" ng-model="prefechahora_prog" class="form-control"/>
                        </div>
                        <div ng-show="step == 2">
                            <h3>SELECCIÓN DE BUS</h3>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btnRegistrarProgramacion" type="submit" class="btn btn-primary">Registrar</button>
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-menu-right"></span> Siguiente</button>
            </div>
        </div>
    </form>
</div>
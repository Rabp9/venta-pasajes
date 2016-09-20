<!-- src/Template/Buses/administrar.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Administrar Bus");
?>
<div class="row">
    <div class="col-md-2 col-sm-offset-1">
        <strong>Código:</strong>
        <span>{{bus.id}}</span>
    </div>
    <div class="col-md-2">
        <strong>Placa:</strong>
        <span>{{bus.placa}}</span>
    </div>
    <div class="col-md-2">
        <strong>Chasis:</strong>
        <span>{{bus.chasis}}</span>
    </div>
    <div class="col-md-2">
        <strong>Año:</strong>
        <span>{{bus.anio}}</span>
    </div>
    <div class="col-md-2">
        <strong>Estado:</strong>
        <span>{{bus.estado.descripcion}}</span>
    </div>
</div>
<form ng-submit="saveBus()">
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="sltPisos">Pisos</label>
                <select id="sltPisos" class="form-control" type="text" ng-model="bus.nro_pisos"
                    ng-options="piso.value as piso.text for piso in [{'value': 1, 'text': '1 Piso'}, {'value': 2, 'text': '2 Pisos'}, {'value': 3, 'text': '3 Pisos'}]">
                    <option value="">Selecciona el número de Pisos</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" ng-repeat="n in [bus.nro_pisos] | makeRange" ng-class='{active:$first}'>
                    <a data-target="#piso{{n + 1}}" aria-controls="piso{{n + 1}}" role="tab" data-toggle="tab">Piso {{n + 1}}</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div ng-repeat="n in [bus.nro_pisos] | makeRange" role="tabpanel" 
                    class="tab-pane panel{{n}}" ng-class='{active:$first, in: $first}' id="piso{{n + 1}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nmAsientos{{n + 1}}">Asientos</label>
                                <input class="form-control" id="nmAsientos{{n + 1}}" type="number" min="0" max="100" ng-model="asientos[n]"
                                    ng-change="onAsientosChange(n)"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="flImagen{{n + 1}}">Imagen</label>
                                <input class="form-control" id="flImagen{{n + 1}}" type="file"  file-model="imagen[n]" 
                                    ngf-select="uploadFile(n)"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <div class="draggable-container">
                                <div ng-if="!pisosLoaded" id="asiento{{n}}{{$index}}" class="draggable" ng-repeat="m in [asientos[n]] | makeRange"
                                     draggable="true" ondragstart="drag(event)">
                                    <span>{{m + 1}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <div class="droppable-container">
                                <img id="img-bus{{n}}" ondragover="allowDrop(event)" class="img-bus" 
                                     ng-src="img/{{folder}}/{{imgUrl[n]}}" ondrop="drop(event)"/>
                                <div ng-if="pisosLoaded" id="asiento{{n}}{{$index}}" class="draggable" ng-repeat="m in [asientos[n]] | makeRange"
                                     draggable="true" ondragstart="drag(event)" dv-draggable data-nro-asiento="{{m}}" data-nro-piso="{{n}}">
                                    <span>{{m + 1}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="btnGuardarBus" type="submit" class="btn btn-primary" ng-disabled="terminado()">Guardar</button>
</form>
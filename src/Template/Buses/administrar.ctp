<!-- src/Template/Buses/administrar.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Administrar Bus");
?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <dl class="dl-horizontal">
            <dt>Código</dt>
            <dd>{{bus.id}}</dd>

            <dt>Placa</dt>
            <dd>{{bus.placa}}</dd>

            <dt>Chasis</dt>
            <dd>{{bus.chasis}}</dd>

            <dt>Año</dt>
            <dd>{{bus.anio}}</dd>

            <dt>Estado</dt>
            <dd>{{bus.estado.descripcion}}</dd>
        </dl>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="sltPisos">Pisos</label>
            <select id="sltPisos" class="form-control" type="text" ng-model="bus.nro_pisos">
                <option value="">Selecciona el número de Pisos</option>
                <option value="1">1 Piso</option>
                <option value="2">2 Piso</option>
                <option value="3">3 Piso</option>
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
                class="tab-pane" ng-class='{active:$first, in: $first}' id="piso{{n + 1}}">
                Asientos en Piso {{n + 1}}
            </div>
        </div>
    </div>
</div> 
<!-- src/Template/Programaciones/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Nueva Programación");
?>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="txtFechaHora">Fecha y Hora</label>
            <input id="txtFechaHora" type="datetime-local" ng-model="programacion.fechahora_prog" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="sltBuses">Bus</label>
            <select id="sltBuses" class="form-control" ng-model="programacion.bus_id" ng-options="bus.id as bus.placa for bus in buses">
                <option value="">Selecciona un Bus</option>
            </select>
        </div>
        <div ng-show="programacion.bus_id != null">
            Información del Bus
        </div>
        <div class="form-group">
            <button class="btn btn-primary" ng-click="addRuta()">Nueva Ruta</button>
        </div>
        <div ng-show="rutas.length != 0">
            Información de rutas
        </div>
        <div class="form-group">
            <button class="btn btn-primary" ng-click="addConductor()">Nuevo Conductor</button>
        </div>
        <div ng-show="conductores.length != 0">
            Información de conductores
        </div>
    </div>
</div>
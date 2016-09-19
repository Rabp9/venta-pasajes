<!-- src/Template/Buses/add.ctp -->
<div ng-controller="AddBusesController">
    <?= $this->Form->create($bus, ["url" => false, "ng-submit" => "addBus()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Bus</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('placa', ["ng-model" => "newBus.placa"]);
                            echo $this->Form->input('chasis', ["ng-model" => "newBus.chasis"]);
                            echo $this->Form->input('anio', ['label' => "Año", "ng-model" => "newBus.anio"]);
                            echo $this->Form->input('motor', ["ng-model" => "newBus.motor"]);
                        ?>
                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <label><input type="radio" ng-model="newBus.estado_id" ng-value="1"> Activo</label>
                                <label><input type="radio" ng-model="newBus.estado_id" ng-value="2"> Inactivo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btnRegistrar" type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
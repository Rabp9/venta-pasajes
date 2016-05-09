<!-- src/Template/Buses/edit.ctp -->
<div ng-controller="EditBusesController">
    <?php echo $this->Form->create($bus, ["url" => false, "ng-submit" => "updateBus()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Bus</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('placa', ["ng-model" => "editBus.placa"]);
                            echo $this->Form->input('chasis', ["ng-model" => "editBus.chasis"]);
                            echo $this->Form->input('anio', ['label' => "Año", "ng-model" => "editBus.anio"]);
                            echo $this->Form->input('motor', ["ng-model" => "editBus.motor"]);
                            echo $this->Form->input("estado_id", [
                                "label" => "Estado",
                                "empty" => "Selecciona uno",
                                "ng-model" => "editBus.estado_id",
                                "options" => [],
                                "ng-options" => "estado.id as estado.descripcion for estado in estados"
                            ]);
                        ?>
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
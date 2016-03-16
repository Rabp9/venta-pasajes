<!-- src/Template/Buses/add.ctp -->
<div ng-controller="AddConductoresController">
    <?= $this->Form->create($conductor, ["url" => false, "ng-submit" => "addConductor()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Conductor</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('persona_id', ["ng-model" => "newConductor.persona_id"]);
                            echo $this->Form->input('licencia', ["ng-model" => "newConductor.licencia"]);
                            echo $this->Form->input('categoria', ["ng-model" => "newConductor.categoria"]);
                          
                            echo $this->Form->input("estado_id", [
                                "label" => "Estado",
                                "empty" => "Selecciona uno",
                                "ng-model" => "newConductor.estado_id"
                            ]);

                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
<!-- src/Template/Buses/edit.ctp -->
<div ng-controller="EditConductoresController">
    <?php echo $this->Form->create($conductor, ["url" => false, "ng-submit" => "updateConductor()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Conductor</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div><span style="color: black; "><h3><?= $conductor->persona-> apellidos  ?> <?= $conductor->persona-> nombres  ?></h3></span></div>
                                         
                        <?php
                            echo $this->Form->input('licencia', ["ng-model" => "editConductor.licencia"]);
                            echo $this->Form->input('categoria', ["ng-model" => "editConductor.categoria"]);
                            
                            echo $this->Form->input("estado_id", [
                                "label" => "Estado",
                                "empty" => "Selecciona uno",
                                "ng-model" => "editConductor.estado_id",
                                "options" => [],
                                "ng-options" => "estado.id as estado.descripcion for estado in estados"
                            ]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
<!-- src/Template/TipoProductos/edit.ctp -->
<div ng-controller="EditTipoProductosController">
    <?php echo $this->Form->create($tipoProducto, ["url" => false, "ng-submit" => "updateTipoProducto()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar TipoProducto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('descripcion', ["ng-model" => "editTipoProducto.descripcion"]);
                            echo $this->Form->input('valor', ["ng-model" => "editTipoProducto.valor"]);
                            echo $this->Form->input("estado_id", [
                                "label" => "Estado",
                                "empty" => "Selecciona uno",
                                "ng-model" => "editTipoProducto.estado_id",
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
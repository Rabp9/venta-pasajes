<!-- src/Template/TipoProductos/add.ctp -->
<div ng-controller="AddTipoProductosController">
    <?= $this->Form->create($tipoProducto, ["url" => false, "ng-submit" => "addTipoProducto()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Tipo de Producto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('descripcion', [
                                "label" => "Descripción", 
                                "ng-model" => "newTipoProducto.descripcion"
                            ]);
                            echo $this->Form->input('valor', [
                                "label" => "Valor", 
                                "ng-model" => "newTipoProducto.valor"
                            ]);
                            echo $this->Form->input("estado_id", [
                                "label" => "Estado",
                                "empty" => "Selecciona uno",
                                "ng-model" => "newTipoProducto.estado_id"
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
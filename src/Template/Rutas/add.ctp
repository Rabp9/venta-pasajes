<!-- src/Template/Rutas/add.ctp -->
<div ng-controller="AddRutasController">
    <?= $this->Form->create($ruta, ["url" => false, "ng-submit" => "addRuta()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Ruta</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('descripcion', [
                                "ng-model" => "newRuta.descripcion",
                                "type" => "text",
                                "required" => true
                            ]);
                        ?>
                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <label><input type="radio" ng-model="newRuta.estado_id" ng-value="1"> Activo</label>
                                <label><input type="radio" ng-model="newRuta.estado_id" ng-value="2"> Inactivo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btnAddRegistrarRuta" type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
<!-- src/Template/Servicios/edit.ctp -->
<div ng-controller="EditServiciosController">
    <?php echo $this->Form->create($servicio, ["url" => false, "ng-submit" => "updateServicio()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Servicio</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('descripcion', ["ng-model" => "editServicio.descripcion"]);
                        ?>
                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <label><input type="radio" ng-model="editServicio.estado_id" ng-value="1"> Activo</label>
                                <label><input type="radio" ng-model="editServicio.estado_id" ng-value="2"> Inactivo</label>
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
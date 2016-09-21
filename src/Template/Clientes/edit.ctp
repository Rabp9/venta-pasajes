<!-- src/Template/Clientes/edit.ctp -->
<div ng-controller="EditClientesController">
    <?php echo $this->Form->create($cliente, ["url" => false, "ng-submit" => "updateCliente()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Cliente</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('ruc', ['label' => 'RUC', "ng-model" => "editCliente.ruc", 'required' => true, 'minlength' => 11]);
                            echo $this->Form->input('razonsocial', ['label' => 'Razón Social', "ng-model" => "editCliente.razonsocial", 'required' => true]);
                            echo $this->Form->input('direccion', ['label' => 'Dirección', "ng-model" => "editCliente.direccion", 'required' => true]);
                            echo $this->Form->input('telefono', ['label' => 'Teléfono', "ng-model" => "editCliente.telefono"]);
                        ?>
                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <label><input type="radio" ng-model="editCliente.estado_id" ng-value="1"> Activo</label>
                                <label><input type="radio" ng-model="editCliente.estado_id" ng-value="2"> Inactivo</label>
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
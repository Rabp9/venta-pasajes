<!-- src/Template/Buses/edit.ctp -->
<div ng-controller="EditPersonasController">
    <?php echo $this->Form->create($persona, ["url" => false, "ng-submit" => "updatePersona()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificar Persona</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('dni', ["ng-model" => "editPersona.dni"]);
                            echo $this->Form->input('nombres', ["ng-model" => "editPersona.nombres"]);
                            echo $this->Form->input('apellidos', ["ng-model" => "editPersona.apellidos"]);
                            echo $this->Form->input('domicilio', ['ng-model' => "editPersona.domicilio"]);
                            echo $this->Form->input('fecha_nac', ["ng-model" => "editPersona.fecha_nac"]);
                            
                            
                            
                            
                            echo $this->Form->input('sexo', ["ng-model" => "editPersona.sexo"]);
                            echo $this->Form->input('telefono', ["ng-model" => "editPersona.telefono"]);
                            echo $this->Form->input('cel', ["ng-model" => "editPersona.cel"]);
                             echo $this->Form->input('correo', ["ng-model" => "editPersona.correo"]);
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





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
                            echo $this->Form->input('dni', ["ng-model" => "editPersona.dni", 'required' => true, 'minlength' => 8]);
                            echo $this->Form->input('nombres', ["ng-model" => "editPersona.nombres", 'required' => true]);
                            echo $this->Form->input('apellidos', ["ng-model" => "editPersona.apellidos", 'required' => true]);
                            echo $this->Form->input('domicilio', ['ng-model' => "editPersona.domicilio", 'required' => true]);
                        ?>
                        <div class="form-group">
                            <label for="fecha_nac">Fecha de Nacimiento</label>
                            <input id="fecha_nac" type="text" ng-model="editPersona.fecha_nac" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select id="sexo" ng-model="editPersona.sexo" class="form-control"
                                ng-options="sexo.value as sexo.text for sexo in [{'value': 'M', 'text': 'Masculino'}, {'value': 'F', 'text': 'Femenino'}]">
                                <option value="">Selecciona uno</option>
                            </select>
                        </div>
                        <?php
                            echo $this->Form->input('telefono', ["ng-model" => "editPersona.telefono"]);
                            echo $this->Form->input('cel', ["ng-model" => "editPersona.cel"]);
                            echo $this->Form->input('correo', ["ng-model" => "editPersona.correo"]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btnRegistrarPersona" type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>





<!-- src/Template/Personas/add.ctp -->
<div ng-controller="AddPersonasController">
    <?= $this->Form->create($persona, ["url" => false, "ng-submit" => "addPersona()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Persona</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('dni', ["ng-model" => "newPersona.dni", "label" => "DNI"]);
                            echo $this->Form->input('nombres', ["ng-model" => "newPersona.nombres"]);
                            echo $this->Form->input('apellidos', ["ng-model" => "newPersona.apellidos"]);
                            echo $this->Form->input('domicilio', ["ng-model" => "newPersona.domicilio"]);
                        ?>
                        <div class="form-group">
                            <label for="fecha_nac">Fecha de Nacimiento</label>
                            <input id="fecha_nac" type="date" ng-model="prefecha_nac" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select id="sexo" ng-model="newPersona.sexo" class="form-control"
                                ng-options="sexo.value as sexo.text for sexo in [{'value': 'M', 'text': 'Masculino'}, {'value': 'F', 'text': 'Femenino'}]">
                                <option value="">Selecciona uno</option>
                            </select>
                        </div>
                        <?php
                            echo $this->Form->input('telefono', ["label" => "Teléfono", "ng-model" => "newPersona.telefono"]);
                            echo $this->Form->input('cel', ["label" => "Celular", "ng-model" => "newPersona.cel"]);
                            echo $this->Form->input('correo', ["ng-model" => "newPersona.correo"]);
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
    <?php echo $this->Html->scriptStart(["block" => "script"]); ?>
    $(document).ready(function() {
        $("#fecha-nac").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>
</div>

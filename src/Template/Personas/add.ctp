<?php /*$this->Html->css("jquery-ui.min", ["block" => "css"]);
    $this->Html->css("jquery-ui.structure.min,css", ["block" => "css"]);
    $this->Html->css("jquery-ui.theme.min,css", ["block" => "css"]);
    
    $this->Html->script("jquery-ui.min", ["block" => "script"]);
    $this->Html->script("datepicker-es", ["block" => "script"]);*/
?>


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
                            echo $this->Form->input('dni', ["ng-model" => "newPersona.dni"]);
                            echo $this->Form->input('nombres', ["ng-model" => "newPersona.nombres"]);
                            echo $this->Form->input('apellidos', ["ng-model" => "newPersona.apellidos"]);
                             echo $this->Form->input('domicilio', ["ng-model" => "newPersona.domicilio"]);
                           echo '<input type="date" name="fecha_nac" id="fecha_nac"
       ng-model="date" 
       value="{{ date | date: "yyyy-MM-dd" }}" />';
                           
                           /* echo $this->Form->input("fecha_nac", 
                                ["label" => "Fecha de Nacimiento","type" => "date",
                                    
                                    ]); */
                            
                            
                            
                            echo $this->Form->input('sexo', ["ng-model" => "newPersona.sexo"]);
                            echo $this->Form->input('telefono', ["ng-model" => "newPersona.telefono"]);
                            echo $this->Form->input('cel', ["ng-model" => "newPersona.cel"]);
                            echo $this->Form->input('correo', ["ng-model" => "newPersona.correo"]);
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

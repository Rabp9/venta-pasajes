<!-- src/Template/Conductores/add.ctp -->
<div ng-controller="AddConductoresController">
    <?= $this->Form->create($conductor, ["url" => false, "ng-submit" => "addConductor()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Conductor</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label for="txtDni">DNI</label>
                            <div class="row">
                                <div class="col-sm-8">
                                    <input class="form-control" ng-model="dni" type="search" maxlength="8">
                                </div>
                                <div class="col-sm-2">
                                    <button id="btnBuscarPersona" class="btn btn-primary" type="button" ng-click="buscarPersona()"><samp class="glyphicon glyphicon-search"></samp> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <span ng-show="searching">Buscando</span>
                        <span ng-show="persona !== null">{{ persona.nombres }} {{ persona.apellidos }}</span>
                        <span ng-hide="persona !== null">No existe</span>
                        <?php
                            echo $this->Form->input('licencia', ["ng-model" => "newConductor.licencia"]);
                            echo $this->Form->input('categoria', ["ng-model" => "newConductor.categoria"]);
                        ?>
                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <label><input type="radio" ng-model="newConductor.estado_id" ng-value="1"> Activo</label>
                                <label><input type="radio" ng-model="newConductor.estado_id" ng-value="2"> Inactivo</label>
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
<!-- src/Template/Buses/add.ctp -->
<div ng-controller="AddAgenciasController">
    <?= $this->Form->create($agencia, ["url" => false, "ng-submit" => "addAgencia()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Agencia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('direccion', ["ng-model" => "newAgencia.direccion", "required" => true]);
                            echo $this->Form->input('telefono', ["ng-model" => "newAgencia.telefono"]);
                            echo $this->Form->input('celular', ["ng-model" => "newAgencia.celular"]);
                        ?>
                        <div class="form-group">
                            <label for="sltUbigeo">Ubigeo</label>
                            <div class="row">
                                <div class="col-sm-4">
                                    <select id="sltDepartamento" class="form-control" ng-model="departamentoSelected"
                                        ng-options="departamento.id as departamento.descripcion for departamento in departamentos"
                                        ng-change="onDepartamentoSelect()" required>
                                        <option value="">Selecciona un Departamento</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select id="sltProvincia" class="form-control" ng-model="provinciaSelected"
                                        ng-options="provincia.id as provincia.descripcion for provincia in provincias"
                                        ng-change="onProvinciaSelect()" ng-show="provincias.length > 0" required>
                                        <option value="">Selecciona una Provincia</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select id="sltDistrito" class="form-control" ng-model="newAgencia.ubigeo_id"
                                        ng-options="distrito.id as distrito.descripcion for distrito in distritos"
                                        ng-change="onDistritoSelect()" ng-show="distritos.length > 0" required>
                                        <option value="">Selecciona un Distrito</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <label><input type="radio" ng-model="newAgencia.estado_id" ng-value="1"> Activo</label>
                                <label><input type="radio" ng-model="newAgencia.estado_id" ng-value="2"> Inactivo</label>
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
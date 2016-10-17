<!-- src/Template/Users/add.ctp -->

<div ng-controller="AddUsersController">
    <?= $this->Form->create($user, ["url" => false, "ng-submit" => "addUser()", 'novalidate' => true]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php
                            echo $this->Form->input('username', [
                                "label" => "Nombre de Usuario", 
                                "ng-model" => "newUser.username",
                                "required" => true
                            ]);
                            echo $this->Form->input('password', [
                                "label" => "Password", 
                                "ng-model" => "newUser.password",
                                'required' => true
                            ]);
                            echo $this->Form->input('repassword', [
                                "label" => "Re-Password",
                                "type" => "password",
                                "ng-model" => "newUser.repassword",
                                'required' => true
                            ]);
                            ?>
                            <div class="form-group">
                                <label for="sltGroup">Grupo</label>
                                <select id="sltGroup" class="form-control"
                                    ng-options="group.id as group.descripcion for group in groups"
                                    ng-model="newUser.user_detalle.group_id" required>
                                    <option value="">Selecciona un Grupo</option>
                                </select>
                            </div>
                            <div class="form-group" ng-show="newUser.user_detalle.group_id == 2">
                                <label for="sltAgencia">Agencia</label>
                                <select id="sltAgencia" class="form-control"
                                    ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                    ng-model="newUser.user_detalle.agencia_id" required>
                                    <option value="">Selecciona una Agencia</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <label><input type="radio" ng-model="newUser.estado_id" ng-value="1"> Activo</label>
                                <label><input type="radio" ng-model="newUser.estado_id" ng-value="2"> Inactivo</label>
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
<!-- src/Template/Users/manage.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Usuarios");
$this->assign("title", "Administrar");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<form ng-submit="save(user)">
    <div id="pnlManageUser" class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Usuario</h3>
        </div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="txtUsername">Username</label>
                    <input id="txtUsername" type="text" class="form-control" ng-model="user.username" readonly />
                </div>
                <div class="col-sm-6">
                    <label for="txtPassword">Nuevo Password</label>
                    <input id="txtPassword" type="password" class="form-control" ng-model="user.newPassword" />
                </div>

                <div class="col-sm-6">
                    <label for="txtRePassword">Confirmar Nuevo Password</label>
                    <input id="txtRePassword" type="password" class="form-control" ng-model="user.newRePassword" />
                </div>

                <div class="col-sm-12">
                    <label for="sltAgencia">Agencia</label>
                    <select id="sltAgencia" ng-model="user.user_detalle.agencia_id" ng-value="4" class="form-control"
                        ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias">
                        <option value="">Seleecionar Agencia</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="form-group">
                <button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</form>
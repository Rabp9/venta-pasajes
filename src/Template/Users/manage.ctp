<!-- src/Template/Users/manage.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Usuarios");
$this->assign("title", "Administrar");
?>
<form>
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
                    <select id="sltAgencia" ng-model="user.agencia_id" ng-value="4" class="form-control"
                        ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias">
                        <option value="">Seleecionar Agencia</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-floppy-disk"> Guardar</span></button>
        </div>
    </div>
</form>
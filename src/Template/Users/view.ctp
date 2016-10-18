<!-- src/Template/Users/view.ctp -->
<div ng-controller="ViewUsersController">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ver Usuario</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?= $user->id ?></dd>
                        
                        <dt>Nombre de Usuario</dt>
                        <dd><?= $user->username ?></dd>
                        
                        <dt>Grupo</dt>
                        <dd><?= $user->user_detalle->group->descripcion ?></dd>
                        
                        <?php if ($user->user_detalle->agencia) { ?>
                        <dt>Agencia</dt>
                        <dd><?= $user->datosAgencia ?></dd>
                        <?php } ?>
                        
                        <dt>Estado</dt>
                        <dd><?= $user->estado->descripcion ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
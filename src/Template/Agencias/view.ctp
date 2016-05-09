<div ng-controller="ViewAgenciasController">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Detalle Agencia</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?= $agencia->id ?></dd>
                        
                        <dt>Ubigeo</dt>
                        <dd><?= $agencia->ubigeo->descripcion ?> (<?= $agencia->ubigeo->parent_ubigeos1->descripcion ?>)</dd>
                        
                        <dt>Dirección</dt>
                        <dd><?= $agencia->direccion ?></dd>
                        
                        <dt>Teléfono</dt>
                        <dd><?= $agencia->telefono ?></dd>
                        
                        <dt>Celular</dt>
                        <dd><?= $agencia->celular ?></dd>
                        
                        <dt>estado</dt>
                        
                        
                        <dd><?= $agencia->estado->descripcion ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
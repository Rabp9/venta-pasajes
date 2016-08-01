<div ng-controller="ViewClientesController">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Detalle Cliente</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?= $cliente->id ?></dd>
                        
                        <dt>RUC</dt>
                        <dd><?= $cliente->ruc ?></dd>
                        
                        <dt>Razón Social</dt>
                        <dd><?= $cliente->razonsocial ?></dd>
                        
                        <dt>Dirección</dt>
                        <dd><?= $cliente->direccion ?></dd>
                        
                        <dt>Teléfono</dt>
                        <dd><?= $cliente->telefono ?></dd>
                        
                        <dt>Estado</dt>
                        <dd><?= $cliente->estado->descripcion ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
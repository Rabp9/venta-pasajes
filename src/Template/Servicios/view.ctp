<!-- src/Template/Servicios/view.ctp -->
<div ng-controller="ViewServiciosController">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ver Servicio</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?= $servicio->id ?></dd>
                        
                        <dt>Descripción</dt>
                        <dd><?= $servicio->descripcion ?></dd>
                        
                        <dt>Estado</dt>
                        <dd><?= $servicio->estado->descripcion ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
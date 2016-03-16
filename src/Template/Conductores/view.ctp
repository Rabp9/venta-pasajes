<div ng-controller="ViewConductoresController">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ver Conductor</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?= $conductor->id ?></dd>
                        
                        <dt>persona_id</dt>
                        <dd><?= $conductor->persona_id ?></dd>
                        
                        <dt>licencia</dt>
                        <dd><?= $conductor->licencia ?></dd>
                        
                        <dt>categoria</dt>
                        <dd><?= $conductor->categoria ?></dd>
                        <dt>Estado</dt>
                        <dd><?= $conductor->estado->descripcion ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
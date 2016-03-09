<!-- src/Template/Buses/view.ctp -->
<div ng-controller="ViewBusesController">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ver Bus</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?= $bus->id ?></dd>
                        
                        <dt>Placa</dt>
                        <dd><?= $bus->placa ?></dd>
                        
                        <dt>Chasis</dt>
                        <dd><?= $bus->chasis ?></dd>
                        
                        <dt>Asientos</dt>
                        <dd><?= $bus->asientos ?></dd>
                        
                        <dt>Año</dt>
                        <dd><?= $bus->anio ?></dd>
                        
                        <dt>Estado</dt>
                        <dd><?= $bus->estado->descripcion ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle Pasaje</h4>
    </div>
    <div class="modal-body">
        <dl>
            <dt>Código Boleta</dt>
            <dd><?= $pasaje->cod_boleto ?></dd>
            <dt>Pasajero</dt>
            <dd><?= $pasaje->persona->full_name ?></dd>
            <dt>DNI</dt>
            <dd><?= $pasaje->persona->dni ?></dd>
            <dt>Fecha</dt>
            <dd><?= $pasaje->programacion->fecha_prog ?></dd>
            <dt>Valor</dt>
            <dd><?= $pasaje->valor_formatted ?></dd>
            <dt>Estado</dt>
            <dd><?= $pasaje->estado->descripcion ?></dd>
        </dl>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
</div>
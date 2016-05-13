<div ng-controller="ViewPersonasController">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Detalle Persona</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?= $persona->id ?></dd>
                        
                        <dt>DNI</dt>
                        <dd><?= $persona->dni ?></dd>
                        
                        <dt>Nombres</dt>
                        <dd><?= $persona->nombres ?></dd>
                        
                        <dt>Apellidos</dt>
                        <dd><?= $persona->apellidos ?></dd>
                        
                        <dt>Domicilio</dt>
                        <dd><?= $persona->domicilio ?></dd>
                        
                        <dt>Fecha de Nacimiento</dt>
                        <dd><?= $persona->fecha_nac->format('Y-m-d') ?></dd>
                        
                        <dt>Sexo</dt>
                        <dd><?= $persona->sexo ?></dd>
                        
                        <dt>Teléfono</dt>
                        <dd><?= $persona->telefono ?></dd>
                        
                        <dt>Celular</dt>
                        <dd><?= $persona->celular ?></dd>
                        
                        <dt>Correo</dt>
                        <dd><?= $persona->correo ?></dd>
                    
                    </dl>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
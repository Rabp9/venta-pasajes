<!-- src/Template/Tarifas/edit.ctp -->
<?= $this->Form->create($tarifa, ["url" => false, "ng-submit" => "updatePostTarifa()"]); ?>
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Editar Tarifa</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="txtServicioEdit">Servicio</label>
                                <input id="txtServicioEdit" type="text" class="form-control" value="{{ editTarifa.servicio.descripcion }}" readonly />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="txtOrigenEdit">Origen</label>
                                <input id="txtOrigenEdit" type="text" class="form-control" value="{{ editTarifa.desplazamiento.AgenciaOrigen.direccion }}" readonly />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="txtDestinoEdit">Destino</label>
                                <input id="txtDestinoEdit" type="text" class="form-control" value="{{ editTarifa.desplazamiento.AgenciaDestino.direccion }}" readonly />
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->input("precio_min", [
                        "label" => "Precio Mínimo",
                        "ng-model" => "editTarifa.precio_min"
                    ]);
                    echo $this->Form->input("precio_max", [
                        "label" => "Precio Máximo",
                        "ng-model" => "editTarifa.precio_max"
                    ]);
                    echo $this->Form->input("tiempo", [
                        "ng-model" => "editTarifa.tiempo"
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </div>
<?= $this->Form->end() ?>
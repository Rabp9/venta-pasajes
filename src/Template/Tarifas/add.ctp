<!-- src/Template/Tarifas/add.ctp -->
<?= $this->Form->create($tarifa, ["url" => false, "ng-submit" => "addTarifa()"]); ?>
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Nueva Tarifa</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtOrigenAdd">Origen</label>
                                <input id="txtOrigenAdd" type="text" class="form-control" value="{{ AgenciaOrigen.direccion }}" readonly />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtDestinoAdd">Destino</label>
                                <input id="txtDestinoAdd" type="text" class="form-control" value="{{ AgenciaDestino.direccion }}" readonly />
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->input("precio_min", [
                        "label" => "Precio Máximo",
                        "ng-model" => "newTarifa.precio_min"
                    ]);
                    echo $this->Form->input("precio_max", [
                        "label" => "Precio Mínimo",
                        "ng-model" => "newTarifa.precio_max"
                    ]);
                    echo $this->Form->input("tiempo", [
                        "ng-model" => "newTarifa.tiempo"
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
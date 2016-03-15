<!-- src/Template/DetalleDesplazamientos/add.ctp -->
<div ng-controller="AddDetalleDesplazamientosController">
    <?= $this->Form->create($detalleDesplazamiento, ["url" => false, "ng-submit" => "addDetalleDesplazamiento()"]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Desplazamiento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label for="txtRuta">Ruta</label>
                            <input id="txtRuta" type="text" class="form-control" ng-model="$parent.ruta_selected.descripcion" />
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sltOrigen">Origen</label>
                                    <select id="sltOrigen" class="form-control"
                                        ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                        ng-model="origen_selected" ng-change="onSelected()">
                                        <option value="">Selecciona una Agencia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sltDestino">Destino</label>
                                    <select id="sltDestino" class="form-control"
                                        ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias"
                                        ng-model="destino_selected" ng-change="onSelected()">
                                        <option value="">Selecciona una Agencia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtTarifaId">Código de Tarifa</label>
                            <input id="txtTarifaId" type="text" ng-model="tarifaSelected.id" class="form-control" readonly />
                        </div>
                        <?= $this->Form->input("precio_min", [
                            "label" => "Precio Mínimo",
                            "ng-model" => "tarifaSelected.precio_min",
                            "readonly" => true
                        ]) ?>
                        <?= $this->Form->input("precio_max", [
                            "label" => "Precio Máximo",
                            "ng-model" => "tarifaSelected.precio_max",
                            "readonly" => true
                        ]) ?>
                        <?= $this->Form->input("tiempo", [
                            "ng-model" => "tarifaSelected.tiempo",
                            "readonly" => true
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
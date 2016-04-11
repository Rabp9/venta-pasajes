<!-- src/Template/Pasajes/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Ventas");
$this->assign("title", "Pasajes");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>

<div class="row">
    <div class="col-md-10">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="dtFecha">Fecha</label>
                    <input id="dtFecha" class="form-control" type="date" ng-model="fecha" /> 
                </div>    
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="sltOrigen">Origen</label>
                    <select id="sltOrigen" ng-model="origen" class="form-control">
                        <option value="">Selecciona un Origen</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="sltDestino">Destino</label>
                    <select id="sltDestino" ng-model="destino" class="form-control">
                        <option value="">Selecciona un Destino</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="list-group">
            <a ng-repeat="programacion in programaciones" class="list-group-item">
                <h4 class="list-group-item-heading">{{programacion.ruta.descripcion}}: Trujillo - Chao - Virú</h4>
                <p class="list-group-item-text">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><strong>Servicio</strong></td>
                                <td><strong>Bus</strong></td>
                                <td><strong>Fecha y Hora</strong></td>
                            </tr>
                            <tr>
                                <td>{{programacion.servicio.descripcion}}</td>
                                <td>{{programacion.bus.placa}}</td>
                                <td>{{programacion.fechahora_prog}}</td>
                            </tr>
                        </table>
                    </div>
                </p>
            </a>
        </div>
    </div>
    <div class="col-md-2">
        dsadasasd
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlBuses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>
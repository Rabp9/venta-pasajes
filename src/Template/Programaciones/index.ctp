<!-- src/Template/Programaciones/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Programación");
$this->assign("title", "Lista de Programaciones");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<a class="btn btn-primary" href="#/programacionesAdd"><span class="glyphicon glyphicon-plus"></span> Nueva Programación</a>

<div class="list-group">
    <a ng-repeat="programacion in programaciones" class="list-group-item">
        <h4 class="list-group-item-heading">{{programacion.ruta.descripcion}}: Trujillo - Chao</h4>
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
                        <td>{{programacion.fechahora_prog | date: 'yyyy-MM-dd'}}</td>
                    </tr>
                </table>
            </div>
        </p>
    </a>
</div>
<!-- Modal -->
<div class="modal fade" id="mdlBuses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl" onload="openModal()">
        
    </div>
</div>